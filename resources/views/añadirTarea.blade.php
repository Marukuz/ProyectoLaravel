@extends('plantillaTareas')
@section('contenido')
<br>
<h1 style="text-align: center;">Añadir tarea</h1><br>
<div id="formulario">
    <form action="{{ route('tareas.store') }}" class="col-9" method="POST">

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
                Cliente:
                <select class="form-select" name="clientes_id">
                    <option selected>{{ old('clientes_id') }}</option>
                    @foreach($clientes as $cliente)
                    <option>{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                @error('clientes_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Correo:
                <br>
                <input type="text" class="form-control" name="correo" value="{{ old('correo') }}">
                @error('correo')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- SEGUNDA FILA -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Nombre:
                <br>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                @error('nombre')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Apellido:
                <br>
                <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">
                @error('apellido')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- TERCERA FILA -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                Telefono:
                <br>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                @error('telefono')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Direccion:
                <br>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                @error('direccion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Poblacion:
                <br>
                <input type="text" class="form-control" name="poblacion" value="{{ old('poblacion') }}">
                @error('poblacion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- CUARTA FILA -->
        <div class="row">
            <div class="div col-3">

                <!-- Filtrado de errores -->
                Codigo Postal:
                <br>
                <input type="text" class="form-control" name="codigo_postal" value="{{ old('codigo_postal') }}">
                @error('codigo_postal')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Provincia:
                <br>
                <select class="form-select" name="provincia">
                    <option selected>{{ old('provincia') }}</option>
                    @foreach($provincias as $provincia)
                    <option>{{$provincia->nombre}}</option>
                    @endforeach
                </select>
                @error('provincia')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Operario:
                <br>
                <select class="form-select" name="empleados_id">
                    <option selected>{{ old('empleados_id') }}</option>
                    @foreach($operarios as $operario)
                    <option>{{$operario->nombre}}</option>
                    @endforeach
                </select>
                @error('empleados_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Fecha:
                <br>
                <input type="date" class="form-control" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}">
                @error('fecha_realizacion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- QUINTA FILA  -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Descripcion:
                <br>
                <textarea class="form-control" name="descripcion" >{{ old('descripcion') }}</textarea><br>
                @error('descripcion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Anotacion:                
                <br>
                <textarea class="form-control" name="anotacion_inicio">{{ old('anotacion_inicio') }}</textarea>
                @error('anotacion_inicio')
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