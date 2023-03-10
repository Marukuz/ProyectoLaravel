<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\paises;
use AmrShawky\LaravelCurrency\Facade\Currency;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = clientes::paginate(10);
        return view('clientes/listaclientes',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paises = paises::all();
        return view('clientes/añadircliente',compact("paises"));
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
            'dni'=>['required','regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre'=>'required|regex:/^[a-z]+$/i',
            'correo'=>'required|email',
            'cuenta_corriente'=>'required',
            'telefono'=>['required','regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'pais'=>'required',
            'importe_mensual'=>'required',
        ]);
        $moneda = paises::where('nombre','=',$datos['pais'])->value('iso_moneda');
        $datos['moneda']=$moneda;
        $converted = Currency::convert()->from('EUR')->to($datos['moneda'])->amount($request->importe_mensual)->round(2)->get();
        $datos['importe_mensual'] = $converted;
        clientes::insert($datos);
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
        $paises = paises::all();
        $cliente = clientes::find($id);
        return view('clientes/modificarcliente',compact("cliente","paises"));
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
            'dni'=>['required','regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre'=>'required|regex:/^[a-z]+$/i',
            'correo'=>'required|email',
            'cuenta_corriente'=>'required',
            'telefono'=>['required','regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'pais'=>'required',
        ]);
        $moneda = paises::where('nombre','=',$datos['pais'])->value('iso_moneda');

        $datos['moneda']=$moneda;
        $datos['importe_mensual'] = 10;
        $cliente = clientes::find($id);

        $cliente->update($datos);
        return redirect()->route('clientes.index');
    }

    /**
     * 
     * Vista para confirmar si se quiere borrar o no la vista.
     */
    public function confirmDestroy($id){

        $cliente = clientes::find($id);
        return view('clientes/eliminarcliente',compact("cliente"));
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
        clientes::destroy($id);
        return redirect()->route('clientes.index');

    }
}
