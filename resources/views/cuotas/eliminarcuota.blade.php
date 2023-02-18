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
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$cuota->id}}</td>
          <td>{{$cuota->concepto}}</td>
          <td>{{$cuota->fecha_emision}}</td>
          <td>{{$cuota->importe}}</td>
          <td>{{$cuota->pagada}}</td>
          <td>{{$cuota->fecha_pago}}</td>
          <td>{{$cuota->notas}}</td>
        <tr>
      </tbody>
    </table>
    <div style="text-align: center;">
      <form action=" {{ route('cuotas.destroy', $cuota) }} " method="post">
      @method('delete')
          <input type="submit" class="btn btn-danger" value="Si">
          <a href="{{ route('cuotas.show',$cuota->clientes_id) }}" class="btn btn-success">No</a>
      </form>
    </div>
  </div>
@endsection