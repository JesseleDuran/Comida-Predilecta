<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte: EMPLEADOS</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> EMPLEADOS DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>

      <table width="650px" cellpadding="5px" cellspacing="5px" style="text-align:center">
      <tr >
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Registrado en:</th>
      </tr>
      @foreach ($users as $user)
      <tr color="#fff">
            
          <td>{{ $user->nombre }}</td>
          <td> {{ $user->cedula }}</td>
          <td> {{ $user->telefono }}</td>
          <td> {{ $user->direccion }}</td>
          <td> {{ $user->created_at }}</td>
          <td>         
      </tr>
      @endforeach
      </table>
    </div>
</div>
</body>
</html>