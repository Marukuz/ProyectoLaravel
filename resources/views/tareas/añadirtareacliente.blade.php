
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/tareas.css')}}">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center;">Añadir tarea</h1><br>
<div id="formulario">
    <form action="{{ route('creartarea') }}" class="col-9" method="POST">
        <!-- PRIMERA FILA -->
        <div class="row">
            <div class="col-6">
                <!-- Filtrado de errores -->
                DNI:
                <br>
                <input type="text" class="form-control" name="dni" value="{{ old('dni') }}">
                @error('dni')
                <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="col-6">
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
            <div class="div col-4">

                <!-- Filtrado de errores -->
                Codigo Postal:
                <br>
                <input type="text" class="form-control" name="codigo_postal" value="{{ old('codigo_postal') }}">
                @error('codigo_postal')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="div col-4">
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
            <div class="div col-4">
                <!-- Filtrado de errores -->
                Fecha:
                <br>
                <input type="datetime-local" class="form-control" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}">
                @error('fecha_realizacion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <br>
        <!-- QUINTA FILA  -->
        <div class="row">
            <div class="col-4">
                <!-- Filtrado de errores -->
                Descripcion:
                <br>
                <textarea class="form-control" name="descripcion" >{{ old('descripcion') }}</textarea><br>
                @error('descripcion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Anotacion Inicial:                
                <br>
                <textarea class="form-control" name="anotacion_inicio">{{ old('anotacion_inicio') }}</textarea>
                @error('anotacion_inicio')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <!-- Filtrado de errores -->
                Anotacion Final:                
                <br>
                <textarea class="form-control" name="anotacion_final">{{ old('anotacion_final') }}</textarea>
                @error('anotacion_final')
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
    
</body>
</html>
