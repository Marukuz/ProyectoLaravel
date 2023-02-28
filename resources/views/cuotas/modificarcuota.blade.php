@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Modificar Cuota</h1><br>
<div id="formulario">
    <form action="{{ route('cuotas.update',$cuota) }}" class="col-9" method="POST">
    @method('put')
        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="col-12">
                <!-- Filtrado de errores -->
                Importe:
                <br>
                <input type="text" class="form-control" name="importe" value="{{ old('importe',$cuota->importe) }}">
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
                <textarea class="form-control" name="concepto">{{ old('concepto',$cuota->concepto) }}</textarea>
                @error('concepto')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Notas:
                <br>
                <textarea class="form-control" name="notas">{{ old('notas',$cuota->notas) }}</textarea>
                @error('notas')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <!-- Tercera fila -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                Pagada:                
                <br>
                <select class="form-select" name="pagada">
                    <option selected>{{ $cuota->pagada }}</option>
                    <option>Si</option>
                    <option>No</option>
                </select>
                @error('pagada')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Fecha de Pago:
                <br>
                <input type="datetime-local" class="form-control" name="fecha_pago" value="{{ old('fecha_pago',$cuota->fecha_pago) }}">
                @error('fecha_pago')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Fecha de Creacion:
                <br>
                <input type="datetime-local" class="form-control" name="fecha_emision" value="{{ $cuota->fecha_emision }}">
                @error('fecha_emision')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br><br>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary col-2">Modificar</button>
        </div><br><br>
    </form>
</div>
@endsection