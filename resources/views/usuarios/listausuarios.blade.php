@extends('plantillaTareas')
@section('contenido')
  <div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Telefono</th>
          <th scope="col">Direccion</th>
          <th scope="col">Tipo</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
        <tr>
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->dni}}</td>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->email}}</td>
          <td>{{$usuario->telefono}}</td>
          <td>{{$usuario->direccion}}</td>
          <td>{{$usuario->tipo}}</td>
        <tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $usuarios->links() }}
    </div>
  </div>
@endsection