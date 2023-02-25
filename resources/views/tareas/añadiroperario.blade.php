@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Asignar Operario</h1><br>
<div id="formulario">
    <form action="{{ route('asignaroperario',$tarea) }}" class="col-9" method="POST">
    @method('put')

        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="div col-12">
                <!-- Filtrado de errores -->
                Operario:
                <br>
                <select class="form-select" name="users_id">
                    <option selected>{{ old('users_id') }}</option>
                    @foreach($operarios as $operario)
                    <option value="{{$operario->id}}">{{$operario->name}}</option>
                    @endforeach
                </select>
                @error('users_id')
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