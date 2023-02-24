@extends('plantillaTareas')
@section('contenido')
<div class="text-center">
    <h1>Saludos.</h1>
    <p>El coste de la cuota es de {{$cuota->importe}}</p>
    <a class="btn btn-primary" href="{{route('paypal.pay',$cuota)}}">Paypal</a>
</div>
@endsection