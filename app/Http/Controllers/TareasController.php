<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;
use App\Models\provincias;
use App\Models\clientes;
use App\Models\empleados;


class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tareas = tareas::all();
        return view('listatareas',['tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $operarios = empleados::all()->where('tipo','=','operario');
        $clientes = clientes::all();
        $provincias = provincias::all();
        return view('añadirTarea',compact("provincias","clientes","operarios"));
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
            'apellido'=>'required|regex:/^[a-z]+$/i',
            'correo'=>'required|email',
            'telefono'=>['required','regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'direccion'=>'required',
            'poblacion'=>'required',
            'codigo_postal'=>'required|regex:/^([0-9]{5})$/',
            'provincia'=>'required',
            'empleados_id'=>'required',
            'fecha_realizacion'=>'nullable',
            'descripcion'=>'nullable',
            'anotacion_inicio'=>'nullable',
            'clientes_id'=>'required',
        
        ]);

        $clienteid = clientes::find($datos['clientes_id'])->id;

        $operarioid = empleados::find($datos['empleados_id'])->id;
        
        $datos['clientes_id'] = $clienteid;
        $datos['empleados_id'] = $operarioid;
        
        Tareas::insert($datos);
        
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
    }
}
