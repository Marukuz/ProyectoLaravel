@extends('plantillaTareas')
@section('contenido')
<div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
      <h1 style="text-align: center;">Quiere eliminar al siguiente cliente?</h1>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Telefono</th>
          <th scope="col">Correo</th>
          <th scope="col">Pais</th>
          <th scope="col">Moneda</th>
          <th scope="col">Importe Mensual</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->dni}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->telefono}}</td>
          <td>{{$cliente->correo}}</td>
          <td>{{$cliente->pais}}</td>
          <td>{{$cliente->moneda}}</td>
          <td>{{$cliente->importe_mensual}}</td>
        <tr>
      </tbody>
    </table>
    <div style="text-align: center;">
      <form action=" {{ route('clientes.destroy', $cliente) }} " method="post">
      @method('delete')
          <input type="submit" class="btn btn-danger" value="Si">
          <a href="{{ route('clientes.index') }}" class="btn btn-success">No</a>
      </form>
    </div>
</div>
@endsection