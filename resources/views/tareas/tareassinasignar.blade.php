@extends('plantillaTareas')
@section('contenido')
<br>
  <h1 style="text-align: center;">Tareas sin Asignar</h1>
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
          <th></th>
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
          <td>{{$tarea->users->name ?? 'No Asignado'}}</td>
          <td>{{$tarea->descripcion}}</td>
          <td>{{$tarea->anotacion_inicial}}</td>
          <td>{{$tarea->fecha_realizacion}}</td>
          <td>
            <a href="{{ route('añadiroperario',$tarea) }}"><button class="btn btn-success">Asignar Operario</button></a>
          </td>
        <tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection