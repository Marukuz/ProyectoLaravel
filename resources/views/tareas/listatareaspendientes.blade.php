@extends('plantillaTareas')
@section('contenido')
  <br>
  <h1 style="text-align: center;">Tareas Pendientes</h1>
  <br>
  <div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
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
        @foreach($tareas as $tarea)
        <tr>
          <td>{{$tarea->id}}</td>
          <td>{{$tarea->clientes->nombre}}</td>
          <td>{{$tarea->telefono}}</td>
          <td>{{$tarea->poblacion}}</td>
          <td>{{$tarea->provincia}}</td>
          <td>{{$tarea->estado_tarea}}</td>
          <td>{{$tarea->users->name}}</td>
          <td>{{$tarea->descripcion}}</td>
          <td>{{$tarea->anotacion_inicial}}</td>
          <td>{{$tarea->fecha_realizacion}}</td>
        <tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection