@extends('plantillaTareas')
@section('contenido')
  <br>
  <h1 style="text-align: center;">Lista Tareas</h1>
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
          <td>{{$tarea->clientes->nombre ?? 'No asignado'}}</td>
          <td>{{$tarea->telefono}}</td>
          <td>{{$tarea->poblacion}}</td>
          <td>{{$tarea->provincia}}</td>
          <td>{{$tarea->estado_tarea}}</td>
          <td>{{$tarea->users->name ?? 'No asignado'}}</td>
          <td>{{$tarea->descripcion}}</td>
          <td>{{$tarea->anotacion_inicio}}</td>
          <td>{{$tarea->fecha_realizacion}}</td>
          <td>
          @if(Auth::user()->tipo=="Administrador")
          <a href="{{ route('tareacompleta',$tarea) }}"><button class="btn btn-success">Ver</button></a>
          <a href="{{ route('tareas.edit',$tarea) }}"><button class="btn btn-warning">Modificar</button></a>
          <a href="{{ route('eliminartarea',$tarea) }}"><button class="btn btn-danger">Eliminar</button></a>
          @endif
          @if(Auth::user()->tipo!="Administrador")
          <a href="{{ route('completartareaview',$tarea) }}"><button class="btn btn-primary">Completar</button></a>
          @endif
          </td>
        <tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $tareas->links() }}
    </div>
  </div>
@endsection