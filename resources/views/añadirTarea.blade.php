@extends('plantillaTareas')
@section('contenido')   
    <br>
    <h1 style="text-align: center;">Añadir tarea</h1><br>
    <div id="formulario" >
        <form method="post">
            <!-- Filtrado de errores -->    
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="dni" value="{{$tareas[0] ?? ''}}"><br>
            <!-- Filtrado de errores -->
            Nombre: {!!$error->ErrorFormateado("nombre")!!}
            <br><input type="text" class="form-control" name="nombre" value="{{$tareas[1] ?? ''}}" ><br>

            <!-- Filtrado de errores -->
            Apellido: {!!$error->ErrorFormateado("apellido")!!}<br>
            <input type="text" class="form-control" name="apellido" value="{{$tareas[2] ?? ''}}"><br>

            <!-- Filtrado de errores -->
            Correo Electronico: {!!$error->ErrorFormateado("correo")!!}<br>
            <input type="text" class="form-control" name="correo" value="{{$tareas[3] ?? ''}}"><br>

            <!-- Filtrado de errores -->
            Telefono: {!!$error->ErrorFormateado("telefono")!!}<br>
            <input type="text" class="form-control" name="telefono" value="{{$tareas[4] ?? ''}}"><br>

            <!-- Filtrado de errores -->
            Direccion: {!!$error->ErrorFormateado("direccion")!!}<br>
            <input type="text" class="form-control" name="direccion" value="{{$tareas[5] ?? ''}}"><br>
            
            <!-- Filtrado de errores -->
            Poblacion: {!!$error->ErrorFormateado("poblacion")!!}<br>
            <input type="text" class="form-control" name="poblacion" value="{{$tareas[6] ?? ''}}" ><br>

            <!-- Filtrado de errores -->
            Codigo Postal: {!!$error->ErrorFormateado("codigop")!!}<br>
            <input type="text" class="form-control" name="codigop" value="{{$tareas[7] ?? ''}}"><br>

            <!-- Filtrado de errores -->
            Provincia: {!!$error->ErrorFormateado("provincia")!!}<br>
            <select class="form-select" name="provincia">
                <option disabled selected>Selecciona</option>
                @foreach ($provincias as $provincia)
                <option>{{$provincia['nombre']}}</option>
                @endforeach
            </select><br>
     
            <!-- Filtrado de errores -->
            Operario encargado: {!!$error->ErrorFormateado("operario")!!}<br>
            <select class="form-select" name="operario">
                <option disabled selected>Selecciona</option>
                <option>Marc</option>
                <option>Kike</option>
                <option>Lara</option>
                <option>Jesus</option>
                <option>David</option>
            </select><br>

            <!-- Filtrado de errores -->
            Fecha Realizacion: {!!$error->ErrorFormateado("fecha")!!}<br>
            <input type="date" class="form-control" name="fecha" value="{{$tareas[10] ?? ''}}"><br>

            <!-- Filtrado de errores -->
            Descripcion: {!!$error->ErrorFormateado("descripcion")!!}<br>
            <textarea class="form-control" name="descripcion" value="{{$tareas[11] ?? ''}}"></textarea><br>
            
            <!-- Filtrado de errores -->
            Anotacion Inicial: {!!$error->ErrorFormateado("anotacioni")!!}<br>
            <textarea class="form-control" name="anotacioni" value="{{$tareas[12] ?? ''}}"></textarea><br>
            
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div><br><br>
        </form>
    </div>
@endsection

