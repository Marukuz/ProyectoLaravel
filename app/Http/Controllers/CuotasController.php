<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cuotas;
use App\Models\clientes;
use App\Mail\Correo;
use Illuminate\Support\Facades\App;



class CuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function generarPDFView($id){
        $cuota = cuotas::findOrFail($id);

        $html = view('cuotas/pdfcuota', compact('cuota'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $pdfContent = $pdf->stream();

        return $pdfContent;
    }

    public function generarPDF($cuota){
        $html = view('cuotas/pdfcuota', compact('cuota'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $pdfContent = $pdf->output();

        return $pdfContent;
    }


    public function generarCuotasMensualesView()
    {
        //
        return view('cuotas/cuotamensual');

    }

    public function generarCuotasMensuales(Request $request)
    {
        //
        $datos = $request->validate([
            'concepto'=>'required',
            'notas'=>'required',
        ]);
        $datos['fecha_emision'] = date('Y-m-d H:i:s');
        $datos['pagada'] = 'No';
        $clientes = clientes::all();

        foreach ($clientes as $cliente){
            $datos['importe'] = $cliente->importe_mensual; 
            $datos['clientes_id'] = $cliente->id;    
            cuotas::insert($datos);
            $destinatario = $cliente->correo;
            $pdfContent = $this->generarPDF($datos);
            Mail::send([], [], function ($message) use ($pdfContent, $destinatario,$cliente) {
                $message->to($destinatario)
                        ->subject('Cuota Mensual')
                        ->text('Hola ' .$cliente->nombre. ' te enviamos la cuota mensual.')
                        ->attachData($pdfContent, 'cuota.pdf');
            });
        }
        return redirect()->route('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $fechaactual = date('Y-m-d H:i:s');
        $cliente = $id;
        return view('cuotas/añadircuota',compact('cliente',"fechaactual"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = $request->validate([
            'concepto'=>'required',
            'importe'=>'required|regex:/^[0-9]+$/',
            'notas'=>'required',
            'fecha_emision'=> [
                'nullable',
                function ($atribute, $value, $fail) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH")) {
                        $fail('La fecha de creación no se puede modificar.');
                    }
                }
            ],
        ]);
        $datos['fecha_emision'] = date('Y-m-d H:i:s');
        $datos['pagada'] = 'No';
        $datos['clientes_id'] = $request->input('clientes_id');
        cuotas::insert($datos);
        return redirect()->route('clientes.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cuotas = cuotas::where('clientes_id','=',$id)->paginate(10);
        return view('cuotas/listacuotas',compact("cuotas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuota = cuotas::find($id);
        return view('cuotas/modificarcuota',compact("cuota"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cuota = cuotas::find($id);
        $fechar = $cuota['fecha_emision'];
        $datos = $request->validate([
            'concepto'=>'required',
            'importe'=>'required|regex:/^[0-9]+$/',
            'notas'=>'required',
            'pagada'=>'required',
            'fecha_pago'=>'nullable',
            'fecha_emision'=>[
                'nullable',
                function ($atribute, $value, $fail) use ($fechar) {
                    if (date("Y-m-d\TH", strtotime($value)) != date("Y-m-d\TH", strtotime($fechar))) {
                        $fail('La fecha de realizacion no puede ser menor a la de creacion.');
                    }
                }
            ],
        ]);

        $cuota->update($datos);
        return redirect()->route('cuotas.show',$cuota->clientes_id);
    }
    
    public function pagarCuota($id){
        $cuota = cuotas::find($id);
        return view('cuotas/pagarcuota',compact("cuota"));
    }
    
    public function confirmDestroy($id){
        $cuota = cuotas::find($id);
        return view('cuotas/eliminarcuota',compact("cuota"));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cuota = cuotas::find($id);
        cuotas::destroy($id);
        return redirect()->route('cuotas.show',$cuota->clientes_id);

    }
}
