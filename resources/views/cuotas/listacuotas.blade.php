@extends('plantillaTareas')
@section('contenido')
  <div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Concepto</th>
          <th scope="col">Fecha Emision</th>
          <th scope="col">Importe</th>
          <th scope="col">Pagada</th>
          <th scope="col">Fecha Pago</th>
          <th scope="col">Notas</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($cuotas as $cuota)
        <tr>
          <td>{{$cuota->id}}</td>
          <td>{{$cuota->concepto}}</td>
          <td>{{$cuota->fecha_emision}}</td>
          <td>{{$cuota->importe}}</td>
          <td>{{$cuota->pagada}}</td>
          <td>{{$cuota->fecha_pago}}</td>
          <td>{{$cuota->notas}}</td>
          <td>
            <a href="{{route('generarpdf',$cuota)}}"><button class="btn btn-primary">Generar PDF</button></a>  
            <a href="{{route('cuotas.edit',$cuota)}}"><button class="btn btn-warning">Modificar</button></a>
            <a href="{{route('eliminarcuota',$cuota)}}"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        <tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $cuotas->links() }}
    </div>
  </div>
@endsection