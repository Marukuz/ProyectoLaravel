@extends('plantillaTareas')
@section('contenido')
  <div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Telefono</th>
          <th scope="col">Correo</th>
          <th scope="col">Pais</th>
          <th scope="col">Moneda</th>
          <th scope="col">Importe Mensual</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->dni}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->telefono}}</td>
          <td>{{$cliente->correo}}</td>
          <td>{{$cliente->pais}}</td>
          <td>{{$cliente->moneda}}</td>
          <td>{{$cliente->importe_mensual}}</td>
          <td>
            <a href=""><button class="btn btn-success">Ver</button></a>
            <a href="{{ route('clientes.edit',$cliente) }}"><button class="btn btn-warning">Modificar</button></a>
            <a href="/"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        <tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $clientes->links() }}
    </div>
  </div>
@endsection