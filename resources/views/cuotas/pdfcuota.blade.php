<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        table,tr,th,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Cuota Mensual</h1>

<div class="container-fluid"> <br>
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">Concepto</th>
          <th scope="col">Fecha Emision</th>
          <th scope="col">Importe</th>
          <th scope="col">Pagada</th>
          <th scope="col">Notas</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$cuota['concepto']}}</td>
          <td>{{$cuota['fecha_emision']}}</td>
          <td>{{$cuota['importe']}}</td>
          <td>{{$cuota['pagada']}}</td>
          <td>{{$cuota['notas']}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>