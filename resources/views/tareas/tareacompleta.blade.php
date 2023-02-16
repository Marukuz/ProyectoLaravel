@extends('plantillaTareas')
@section('contenido')

<div>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">DNI</th>
        <th scope="col">Cliente</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Direccion</th>
        <th scope="col">Poblacion</th>
        <th scope="col">Codigo Postal</th>
        <th scope="col">Provincia</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha de creacion</th>
        <th scope="col">Operario</th>
        <th scope="col">Fecha de realizacion</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Anotacion inicial</th>
        <th scope="col">Anotacion final</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $tarea['id'] }}</td>
          <td>{{ $tarea['dni'] }}</td>
          <td>{{ $tarea->clientes->nombre }}</td>
          <td>{{ $tarea['nombre'] }}</td>
          <td>{{ $tarea['apellido'] }}</td>
          <td>{{ $tarea['telefono'] }}</td>
          <td>{{ $tarea['correo'] }}</td>
          <td>{{ $tarea['direccion'] }}</td>
          <td>{{ $tarea['poblacion'] }}</td>
          <td>{{ $tarea['codigo_postal'] }}</td>
          <td>{{ $tarea['provincia'] }}</td>
          <td>{{ $tarea['estado_tarea'] }}</td>
          <td>{{ $tarea['fecha_creacion'] }}</td>
          <td>{{ $tarea->empleados->nombre }}</td>
          <td>{{ $tarea['fecha_realizacion'] }}</td>
          <td>{{ $tarea['descripcion'] }}</td>
          <td>{{ $tarea['anotacion_inicio'] }}</td>
          <td>{{ $tarea['anotacion_final'] }}</td>
        </tr>
    </tbody>
  </table>
</div>
</body>
</html>
@endsection