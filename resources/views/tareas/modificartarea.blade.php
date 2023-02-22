@extends('plantillaTareas')
@section('contenido')
    <h1 style="text-align: center;">Modificar tarea</h1><br>
    <div id="formulario">
        <form action="{{ route('tareas.update',$tarea) }}" class="col-9" method="POST">
        @method('put')
            <!-- Primera columna -->
            <div class="row">
                <div class="col-3">
                    ID Tarea: <br>
                    <input type="text" class="form-control" name="id" value="{{$tarea['id'] ?? ''}}" readonly><br>
                </div>
                <div class="col-3">
                    DNI: <br>
                    <input type="text" class="form-control" name="dni" value="{{old('dni',$tarea['dni'])}}">
                    @error('dni')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3">
                    Cliente:
                    <select class="form-select" name="clientes_id">Marukuz/proyecto_larave
                        <option selected value="{{$tarea->clientes->id}}">{{ old('clientes_id',$tarea->clientes->nombre) ?? ''}}</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                    @error('clientes_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3">
                    Correo Electronico:<br>
                    <input type="text" class="form-control" name="correo" value="{{old('correo',$tarea['correo']) }}">
                    @error('correo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="row">
                <div class="col-6">
                    Nombre: <br>
                    <input type="text" class="form-control" name="nombre" value="{{old('nombre',$tarea['nombre'])}}">
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-6">
                    Apellido: <br>
                    <input type="text" class="form-control" name="apellido" value="{{old('apellido',$tarea['apellido'])}}">
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
                    <input type="text" class="form-control" name="telefono" value="{{old('telefono',$tarea['telefono'])}}">
                    @error('telefono')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Direccion:<br>
                    <input type="text" class="form-control" name="direccion" value="{{old('direccion',$tarea['direccion'])}}">
                    @error('direccion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Poblacion:<br>
                    <input type="text" class="form-control" name="poblacion" value="{{old('poblacion',$tarea['poblacion'])}}">
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
                    <input type="text" class="form-control" name="codigo_postal" value="{{old('codigo_postal',$tarea['codigo_postal'])}}">
                    @error('codigo_postal')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Provincia:  <br>
                    <select class="form-select" name="provincia">
                        <option selected>{{$tarea['provincia']}}</option>
                        @foreach ($provincias as $provincia)
                        <option>{{$provincia['nombre']}}</option>
                        @endforeach
                    </select>
                    @error('provincia')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                Operario:
                <br>
                    <select class="form-select" name="users_id">
                        <option selected value="{{$tarea->users->id ?? ''}}">{{ $tarea->users->name ?? ''}}</option>
                        @foreach($operarios as $operario)
                        <option value="{{$operario->id}}">{{$operario->name}}</option>
                        @endforeach
                    </select>
                    @error('users_id')
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
                    <input type="datetime-local" class="form-control" name="fecha_realizacion"  value="{{old('fecha_realizacion',$tarea['fecha_realizacion'])}}"><br>
                    @error('fecha_realizacion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Estado Tarea: <br>
                    <select class="form-select" name="estado_tarea">
                        <option selected>{{$tarea['estado_tarea']}}</option>
                        <option>B</option>
                        <option>P</option>
                        <option>R</option>
                        <option>C</option>
                    </select>
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
                    <textarea class="form-control" name="descripcion">{{old('descripcion',$tarea['descripcion'])}}</textarea>
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
                <input type="submit" class="btn btn-primary" value="Modificar">
            </div><br><br>
        </form>
    </div>
</body>
</html>
@endsection