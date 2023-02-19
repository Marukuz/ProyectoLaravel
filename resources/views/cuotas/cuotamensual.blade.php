@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Generar Cuota Mensual</h1><br>
<div id="formulario">
    <form action="{{ route('generarcuotas') }}" class="col-9" method="POST">
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
            <button type="submit" class="btn btn-primary col-2">Generar</button>
        </div><br><br>
    </form>
</div>
@endsection