@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Añadir Cuotas</h1><br>
<div id="formulario">
    <form action="{{ route('cuotas.store') }}" class="col-9" method="POST">
    <input type="hidden" name="clientes_id" value="{{ $cliente }}">
        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Fecha de Creacion:
                <br>
                <input type="datetime-local" class="form-control" name="fecha_emision" value="{{ $fechaactual }}">
                @error('fecha_emision')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Importe:
                <br>
                <input type="text" class="form-control" name="importe" value="{{ old('importe') }}">
                @error('importe')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
        </div>
        <br>
        <!-- Segunda fila -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Concepto:                
                <br>
                <textarea class="form-control" name="concepto">{{ old('concepto') }}</textarea>
                @error('concepto')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Notas:
                <br>
                <textarea class="form-control" name="notas">{{ old('notas') }}</textarea>
                @error('notas')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br><br>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary col-2">Añadir</button>
        </div><br><br>
    </form>
</div>
@endsection