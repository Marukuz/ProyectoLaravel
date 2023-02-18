<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;
use App\Models\provincias;
use App\Models\clientes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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
        if(Auth::user()->tipo=="Administrador"){
            $tareas = tareas::paginate(2);
            return view('tareas/listatareas',['tareas'=>$tareas]);    
        }else{
            $tareas = tareas::where('users_id','=',Auth::user()->id)->paginate(10);
            return view('tareas/listatareas',['tareas'=>$tareas]);    
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->tipo=="Administrador"){
            $operarios = User::all()->where('tipo','=','Operario');
            $clientes = clientes::all();
            $provincias = provincias::all();
            return view('tareas/añadirtarea',compact("provincias","clientes","operarios"));
        }else{
            return redirect()->route('tareas.index');
        }
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
            'users_id'=>'required',
            'fecha_realizacion'=>'nullable',
            'descripcion'=>'required',
            'anotacion_inicio'=>'nullable',
            'anotacion_final'=>'nullable',
            'clientes_id'=>'required',
        
        ]);

        
        $clienteid = clientes::find($datos['clientes_id'])->id;

        $operarioid = User::find($datos['users_id'])->id;
        
        $datos['estado_tarea'] = 'B';
        $datos['clientes_id'] = $clienteid;
        $datos['users_id'] = $operarioid;
        $fechaactual = date('Y-m-d H:i:s');
        $datos['fecha_creacion'] = $fechaactual;
        
        Tareas::insert($datos);
        return redirect()->route('tareas.index');
        
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
     * 
     * Muestra todas las tareas pendientes.
     * 
     */
    public function showPending(){
        //
        if(Auth::user()->tipo=="Administrador"){
            $tareas = tareas::where('estado_tarea','=','P')->get();
            return view('tareas/listatareaspendientes',['tareas'=>$tareas]);
        }else{
            return redirect()->route('tareas.index');
        }
    }
    
    /**
     *
     * Muestra una tarea completa en concreto
     */
    public function tareaCompleta($id){
        if(Auth::user()->tipo=="Administrador"){
            $tarea = tareas::find($id);
            return view('tareas/tareacompleta',compact("tarea"));
        }else{
            return redirect()->route('tareas.index');
        }
    }
    /**
     * 
     * Funcion que envia el formulario para completar una tarea
     */
    public function completarTareaView($id){
        if(Auth::user()->tipo!="Administrador"){
            $tarea = tareas::find($id);
            return view('tareas/completartarea',compact("tarea"));
        }
    }
    /**
     * 
     * Funcion que completa la tarea con los datos recibidos.
     */
    public function completarTarea(Request $request,$id){
        $datos = $request->validate([
            'estado_tarea'=>'required',
            'anotacion_inicio'=>'nullable',
            'anotacion_final'=>'nullable',
        ]);
        $tarea = tareas::find($id);
        $tarea->update($datos);
        return redirect()->route('tareas.index');
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
        if(Auth::user()->tipo=="Administrador"){
            $tarea = tareas::find($id);
            $operarios = User::where('tipo','=','operario')->get();
            $clientes = clientes::where('nombre','!=',$tarea->clientes->nombre)->get();
            $provincias = provincias::all();

            return view('tareas/modificartarea',compact("tarea","clientes","operarios","provincias"));
        }else{
            return redirect()->route('tareas.index');
        }

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
            'apellido'=>'required|regex:/^[a-z]+$/i',
            'correo'=>'required|email',
            'telefono'=>['required','regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'direccion'=>'required',
            'poblacion'=>'required',
            'codigo_postal'=>'required|regex:/^([0-9]{5})$/',
            'provincia'=>'required',
            'users_id'=>'required',
            'estado_tarea'=>'required',
            'fecha_realizacion'=>'nullable',
            'descripcion'=>'required',
            'anotacion_inicio'=>'nullable',
            'anotacion_final'=>'nullable',
            'clientes_id'=>'required',
        ]);

        $tarea = tareas::find($id);
        $tarea->update($datos);
        return redirect()->route('tareas.index');
    }

    /**
     * 
     * Vista para confirmar si se quiere borrar o no la vista.
     */
    public function confirmDestroy($id){
        if(Auth::user()->tipo=="Administrador"){
            $tarea = tareas::find($id);
            return view('tareas/eliminartarea',compact("tarea"));
        }else{
            return redirect()->route('tareas.index');
        }
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
        Tareas::destroy($id);
        return redirect()->route('tareas.index');

    }
}
