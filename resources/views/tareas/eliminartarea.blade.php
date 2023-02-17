@extends('plantillaTareas')
@section('contenido')
<div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
      <h1 style="text-align: center;">Quiere eliminar la siguiente tarea?</h1>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Cliente</th>
          <th scope="col">Telefono</th>
          <th scope="col">Poblacion</th>
          <th scope="col">Provincia</th>
          <th scope="col">Estado</th>
          <th scope="col">Operario</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Anotacion Inicial</th>
          <th scope="col">Fecha de realizacion</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$tarea->id}}</td>
          <td>{{$tarea->clientes->nombre}}</td>
          <td>{{$tarea->telefono}}</td>
          <td>{{$tarea->poblacion}}</td>
          <td>{{$tarea->provincia}}</td>
          <td>{{$tarea->estado_tarea}}</td>
          <td>{{$tarea->users->name}}</td>
          <td>{{$tarea->descripcion}}</td>
          <td>{{$tarea->anotacion_inicio}}</td>
          <td>{{$tarea->fecha_realizacion}}</td>
        <tr>
      </tbody>
    </table>
    <div style="text-align: center;">
      <form action=" {{ route('tareas.destroy', $tarea) }} " method="post">
      @method('delete')
          <input type="submit" class="btn btn-danger" value="Si">
          <a href="{{ route('tareas.index') }}" class="btn btn-success">No</a>
      </form>
    </div>
</div>
@endsection