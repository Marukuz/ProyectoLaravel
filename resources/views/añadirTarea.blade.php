@extends('plantillaTareas')
@section('contenido')   
    <br>
    <h1 style="text-align: center;">Añadir tarea</h1><br>
    <div id="formulario" >
        <form action="{{ route('tareas.store') }}" class="col-2" method="POST">
            <!-- Filtrado de errores -->    
            DNI:
            @error('dni')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br>
            <input type="text" class="form-control" name="dni" value=""><br>
            <!-- Filtrado de errores -->
            Nombre:
            @error('nombre')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="nombre" value="" ><br>

            <!-- Filtrado de errores -->
            Apellido:
            @error('apellido')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="apellido" value=""><br>

            <!-- Filtrado de errores -->
            Correo:
            @error('correo')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="correo" value=""><br>

            <!-- Filtrado de errores -->
            Telefono:
            @error('telefono')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="telefono" value=""><br>

            <!-- Filtrado de errores -->
            Direccion:
            @error('direccion')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="direccion" value=""><br>
            
            <!-- Filtrado de errores -->
            Poblacion:
            @error('poblacion')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="poblacion" value="" ><br>

            <!-- Filtrado de errores -->
            Codigo Postal:
            @error('codigop')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="text" class="form-control" name="codigop" value=""><br>

            <!-- Filtrado de errores -->
            Provincia:
            @error('provincia')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <select class="form-select" name="provincia">
                <option disabled selected>Selecciona</option>
                @foreach($provincias as $provincia)
                <option>{{$provincia->nombre}}</option>
                @endforeach
            </select><br>
     
            <!-- Filtrado de errores -->
            Operario:
            @error('operario')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <select class="form-select" name="operario">
                <option disabled selected>Selecciona</option>
                <option>Marc</option>
                <option>Kike</option>
                <option>Lara</option>
                <option>Jesus</option>
                <option>David</option>
            </select><br>

            <!-- Filtrado de errores -->
            Fecha:
            @error('fecha')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <input type="date" class="form-control" name="fecha" value=""><br>

            <!-- Filtrado de errores -->
            Descripcion:
            @error('descripcion')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <textarea class="form-control" name="descripcion" value=""></textarea><br>
            
            <!-- Filtrado de errores -->
            Anotacion:
            @error('anotacion')
            <span class="text-danger">{{$message}}</span>
            @enderror   
            <br> 
            <textarea class="form-control" name="anotacion" value=""></textarea><br>
            
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary col-3">Añadir</button>
            </div><br><br>
        </form>
    </div>
@endsection

