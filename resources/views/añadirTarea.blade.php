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
                @error('dni')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="dni" value="{{ old('dni') }}"><br>
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Cliente:
                @error('cliente')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <select class="form-select" name="cliente">
                    <option selected>{{ old('cliente') }}</option>
                    @foreach($clientes as $cliente)
                    <option>{{$cliente->nombre}}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Correo:
                @error('correo')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="correo" value="{{ old('correo') }}"><br>
            </div>
        </div>

        <!-- SEGUNDA FILA -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                Nombre:
                @error('nombre')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"><br>
            </div>
            <div class="col-6">
                <!-- Filtrado de errores -->
                Apellido:
                @error('apellido')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}"><br>
            </div>
        </div>

        <!-- TERCERA FILA -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                Telefono:
                @error('telefono')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}"><br>
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Direccion:
                @error('direccion')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}"><br>
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Poblacion:
                @error('poblacion')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="poblacion" value="{{ old('poblacion') }}"><br>
            </div>
        </div>

        <!-- CUARTA FILA -->
        <div class="row">
            <div class="div col-3">

                <!-- Filtrado de errores -->
                Codigo Postal:
                @error('codigop')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="text" class="form-control" name="codigop" value="{{ old('codigop') }}"><br>

            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Provincia:
                @error('provincia')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <select class="form-select" name="provincia">
                    <option selected>{{ old('provincia') }}</option>
                    @foreach($provincias as $provincia)
                    <option>{{$provincia->nombre}}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Operario:
                @error('operario')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <select class="form-select" name="operario">
                    <option selected>{{ old('operario') }}</option>
                    @foreach($operarios as $operario)
                    <option>{{$operario->nombre}}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="div col-3">
                <!-- Filtrado de errores -->
                Fecha:
                @error('fecha')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}"><br>

            </div>
        </div>

        <!-- QUINTA FILA  -->
        <div class="row">
            <div class="col-6">

                <!-- Filtrado de errores -->
                Descripcion:
                @error('descripcion')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <textarea class="form-control" name="descripcion" >{{ old('descripcion') }}</textarea><br>
            </div>
            <div class="col-6">

                <!-- Filtrado de errores -->
                Anotacion:
                @error('anotacion')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <textarea class="form-control" name="anotacion">{{ old('anotacion') }}</textarea><br>

            </div>
        </div>
        <br><br>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary col-3">Añadir</button>
        </div><br><br>
    </form>
</div>
@endsection