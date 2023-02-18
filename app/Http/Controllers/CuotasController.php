<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cuotas;
use App\Models\clientes;



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
        $cuotas = cuotas::where('clientes_id','=',$id)->paginate(2);
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
