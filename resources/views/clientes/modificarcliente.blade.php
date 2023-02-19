@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Modificar Cliente</h1><br>
<div id="formulario">
    <form action="{{ route('clientes.update',$cliente) }}" class="col-9" method="POST">
    @method('put')
        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                DNI:
                <br>
                <input type="text" class="form-control" name="dni" value="{{ old('dni',$cliente['dni']) }}">
                @error('dni')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Correo:
                <br>
                <input type="text" class="form-control" name="correo" value="{{ old('correo',$cliente['correo']) }}">
                @error('correo')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Nombre:
                <br>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre',$cliente['nombre']) }}">
                @error('nombre')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- SEGUNDA FILA -->
        <div class="row">
            <div class="col-12">
                <!-- Filtrado de errores -->
                Telefono:
                <br>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono',$cliente['telefono']) }}">
                @error('telefono')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- Tercera fila -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Cuenta Corriente:
                <br>
                <input type="text" class="form-control" name="cuenta_corriente" value="{{ old('cuenta_corriente',$cliente['cuenta_corriente']) }}">
                @error('cuenta_corriente')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Pais:
                <br>
                <select class="form-select" name="pais">
                    <option selected>{{ old('pais',$cliente['pais']) }}</option>
                    @foreach ($paises as $pais)
                    <option>{{$pais['nombre']}}</option>
                    @endforeach
                </select>
                @error('pais')
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