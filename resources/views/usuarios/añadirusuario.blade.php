@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Añadir Empleado</h1><br>
<div id="formulario">
    <form action="{{ route('usuarios.store') }}" class="col-9" method="POST">

        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                DNI:
                <br>
                <input type="text" class="form-control" name="dni" value="{{ old('dni') }}">
                @error('dni')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Correo:
                <br>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Nombre:
                <br>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- SEGUNDA FILA -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Contraseña:
                <br>
                <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Telefono:
                <br>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
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
                Direccion:
                <br>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                @error('direccion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Tipo:
                <br>
                <select class="form-select" name="tipo">
                    <option selected>{{ old('tipo') }}</option>
                    <option>Administrador</option>
                    <option>Operario</option>
                </select>
                @error('tipo')
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