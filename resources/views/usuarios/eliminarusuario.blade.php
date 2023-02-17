@extends('plantillaTareas')
@section('contenido')
<div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
      <h1 style="text-align: center;">Quiere eliminar al siguiente Empleado?</h1>
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
        <tr>
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->dni}}</td>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->email}}</td>
          <td>{{$usuario->telefono}}</td>
          <td>{{$usuario->direccion}}</td>
          <td>{{$usuario->tipo}}</td>
        <tr>
      </tbody>
    </table>
    <div style="text-align: center;">
      <form action=" {{ route('usuarios.destroy', $usuario) }} " method="post">
      @method('delete')
          <input type="submit" class="btn btn-danger" value="Si">
          <a href="{{ route('usuarios.index') }}" class="btn btn-success">No</a>
      </form>
    </div>
</div>
@endsection