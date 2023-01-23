@extends('plantillaTareas')
@section('contenido')
  <div> 
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Telefono</th>
          <th scope="col">Poblacion</th>
          <th scope="col">Provincia</th>
          <th scope="col">Estado</th>
          <th scope="col">Operario</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Anotacion Inicial</th>
          <th scope="col">Fecha de realizacion</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($tarea as $tareas)
        <tr>
          <td>{{$tareas['tarea_id']}}</td>
          <td>{{$tareas['nombre']}}</td>
          <td>{{$tareas['apellido']}}</td>
          <td>{{$tareas['telefono']}}</td>
          <td>{{$tareas['poblacion']}}</td>
          <td>{{$tareas['provincia']}}</td>
          <td>{{$tareas['estado_tarea']}}</td>
          <td>{{$tareas['operario_encargado']}}</td>
          <td>{{$tareas['descripcion']}}</td>
          <td>{{$tareas['anotacion_inicial']}}</td>
          <td>{{$tareas['fecha_realizacion']}}</td>
        <tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection