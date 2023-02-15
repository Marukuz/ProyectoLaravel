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
                    <select class="form-select" name="clientes_id">
                        <option selected>{{ old('clientes_id',$tarea->clientes->nombre) }}</option>
                        @foreach($clientes as $cliente)
                        <option>{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                    @error('clientes_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3">
                    Correo Electronico:<br>
                    <input type="text" class="form-control" name="correo" value="{{$tarea['correo'] ?? ''}}">
                    @error('correo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Segunda columna -->
            <div class="row">
                <div class="col-6">
                    Nombre: <br>
                    <input type="text" class="form-control" name="nombre" value="{{$tarea['nombre'] ?? ''}}">
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-6">
                    Apellido: <br>
                    <input type="text" class="form-control" name="apellido" value="{{$tarea['apellido'] ?? ''}}">
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
                    <input type="text" class="form-control" name="telefono" value="{{$tarea['telefono'] ?? ''}}">
                    @error('telefono')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Direccion:<br>
                    <input type="text" class="form-control" name="direccion" value="{{$tarea['direccion'] ?? ''}}">
                    @error('direccion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Poblacion:<br>
                    <input type="text" class="form-control" name="poblacion" value="{{$tarea['poblacion'] ?? ''}}">
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
                    <input type="text" class="form-control" name="codigo_postal" value="{{$tarea['codigo_postal'] ?? ''}}">
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
                    Operario encargado: <br>
                    <select class="form-select" name="empleados_id">
                        <option selected></option>
                        <option>Marc</option>
                        <option>Kike</option>
                        <option>Lara</option>
                        <option>Jesus</option>
                        <option>David</option>
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
                    <input type="date" class="form-control" name="fechac" value="{{$tarea['fecha_creacion'] ?? ''}}" readonly><br>

                </div>
                <div class="col-4">
                    Fecha Realizacion: <br>
                    <input type="date" class="form-control" name="fecha_realizacion"  value="{{$tarea['fecha_realizacion'] ?? ''}}"><br>
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
                    <textarea class="form-control" name="descripcion">{{$tarea['descripcion']}}</textarea>
                    @error('descripcion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Anotacion inicial: <br>
                    <textarea class="form-control" name="anotacioni" >{{$tarea['anotacion_inicio'] }}</textarea>
                    @error('anotacion_inicio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    Anotacion final: <br>
                    <textarea class="form-control" name="anotacionf" >{{$tarea['anotacion_final']}}</textarea>
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