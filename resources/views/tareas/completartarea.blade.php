@extends('plantillaTareas')
@section('contenido')
    <h1 style="text-align: center;">Completar tarea</h1><br>
    <div id="formulario">
        <form action="{{ route('completartarea',$tarea) }}" class="col-9" method="POST">
        @method('put')
            <!-- Primera columna -->
            <div class="row">
                <div class="col-3">
                    ID Tarea: <br>
                    <input type="text" class="form-control" name="id" value="{{$tarea['id'] ?? ''}}" readonly><br>
                </div>
                <div class="col-3">
                    DNI: <br>
                    <input type="text" class="form-control" name="dni" value="{{old('dni',$tarea['dni'])}}" readonly>
                    @error('dni')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3">
                    Cliente:
                    <select class="form-select" name="clientes_id" disabled>
                        <option selected value="{{$tarea->clientes->id}}">{{ old('clientes_id',$tarea->clientes->nombre) }}</option>
                    </select>
                    @error('clientes_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3">
                    Correo Electronico:<br>
                    <input type="text" class="form-control" name="correo" value="{{old('correo',$tarea['correo']) }}" readonly>
                    @error('correo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="row">
                <div class="col-6">
                    Nombre: <br>
                    <input type="text" class="form-control" name="nombre" value="{{old('nombre',$tarea['nombre'])}}" readonly>
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-6">
                    Apellido: <br>
                    <input type="text" class="form-control" name="apellido" value="{{old('apellido',$tarea['apellido'])}}" readonly>
                    @error('apellido')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <!-- Tercera columna -->
            <div class="row">
                <div class="col-4">
                    Telefono:<br>
                    <input type="text" class="form-control" name="telefono" value="{{old('telefono',$tarea['telefono'])}}" readonly>
                    @error('telefono')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Direccion:<br>
                    <input type="text" class="form-control" name="direccion" value="{{old('direccion',$tarea['direccion'])}}" readonly>
                    @error('direccion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Poblacion:<br>
                    <input type="text" class="form-control" name="poblacion" value="{{old('poblacion',$tarea['poblacion'])}}" readonly>
                    @error('poblacion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
           <!-- Cuarta columna -->
           <div class="row">
                <div class="col-4">
                    Codigo Postal:<br>
                    <input type="text" class="form-control" name="codigo_postal" value="{{old('codigo_postal',$tarea['codigo_postal'])}}" readonly>
                    @error('codigo_postal')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Provincia:  <br>
                    <select class="form-select" name="provincia" disabled>
                        <option selected>{{$tarea['provincia']}}</option>
                    </select>
                    @error('provincia')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                Operario:
                <br>
                    <select class="form-select" name="empleados_id" disabled>
                        <option selected value="{{$tarea->empleados->id}}">{{ $tarea->empleados->nombre }}</option>
                    </select>
                    @error('empleados_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
           </div>
           <br>
           <!-- Quinta columna -->
           <div class="row">
                <div class="col-4">
                    Fecha creacion: <br>
                    <input type="datetime-local" class="form-control" name="fechac" value="{{$tarea['fecha_creacion'] ?? ''}}" readonly><br>

                </div>
                <div class="col-4">
                    Fecha Realizacion: <br>
                    <input type="datetime-local" class="form-control" name="fecha_realizacion"  value="{{old('fecha_realizacion',$tarea['fecha_realizacion'])}}" readonly><br>
                    @error('fecha_realizacion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Estado Tarea: <br>
                    <input class="form-check-input" type="radio" name="estado_tarea" value="B"> B |
                    <input class="form-check-input" type="radio" name="estado_tarea" value="P"> P |
                    <input class="form-check-input" type="radio" name="estado_tarea" value="R" checked> R |
                    <input class="form-check-input" type="radio" name="estado_tarea" value="C"> C
                    @error('estado_tarea')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
           </div>
           <br>
            <!-- Sexta columna -->
            <div class="row">
                <div class="col-4">
                    Descripcion: <br>
                    <textarea class="form-control" name="descripcion" readonly>{{old('descripcion',$tarea['descripcion'])}}</textarea>
                    @error('descripcion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Anotacion inicial: <br>
                    <textarea class="form-control" name="anotacion_inicio" >{{old('anotacion_inicio',$tarea['anotacion_inicio'])}}</textarea>
                    @error('anotacion_inicio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Anotacion final: <br>
                    <textarea class="form-control" name="anotacion_final" >{{old('anotacion_final',$tarea['anotacion_final'])}}</textarea>
                    @error('anotacion_final')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-primary" value="Completar">
            </div><br><br>
        </form>
    </div>
</body>
</html>
@endsection