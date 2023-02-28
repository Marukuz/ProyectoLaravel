<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use App\Models\cuotas;
use App\Models\clientes;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {    
    

        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }
    public function payWithPayPal($id)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal(cuotas::find($id)->importe);
        $amount->setCurrency(clientes::find(cuotas::find($id)->clientes_id)->moneda);

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Pago de cuota mensual');

        $callbackUrl = url('/paypal/status/'.$id);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }
    public function payPalStatus(Request $request,$id)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect()->route('pagofinalizado', ['id' => $id])->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'El pago se ha realizado correctamente.';
            $cuota = cuotas::find($id);
            $cuota->pagada = 'Si';
            $cuota->save();  
            return redirect(route('pagofinalizado'))->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect(route('pagofinalizado'))->with(compact('status'));
    }
    public function pagoFinalizado(Request $request)
    {
        $status = $request->session()->get('status');
        return view('cuotas/pagofinalizado', compact('status'));
    }

}
