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


    public function generarPDF($id){
        $cuota = cuotas::findOrFail($id);

        $html = view('generarpdf', compact('cuota'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();
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
            $correo = new Correo($cliente->nombre);   
            $datos['clientes_id'] = $cliente->id;    
            $datos['importe'] = $cliente->importe_mensual; 
            $destinatario = $cliente->correo;
            Mail::to($destinatario)->send($correo);
            cuotas::insert($datos);
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
        $cliente = $id;
        return view('cuotas/añadircuota',compact('cliente'));
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
        $datos = $request->validate([
            'concepto'=>'required',
            'importe'=>'required|regex:/^[0-9]+$/',
            'notas'=>'required',
            'pagada'=>'required',
            'fecha_pago'=>'nullable',
        ]);

        $cuota = cuotas::find($id);
        $cuota->update($datos);
        return redirect()->route('cuotas.show',$cuota->clientes_id);
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
