<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte: CLIENTES</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> CLIENTES DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>


      <table width="500px" cellpadding="5px" cellspacing="5px" style="text-align:center" >
      <tr >
              <th>Nombre</th>
            <th>Cédula</th>
      </tr>
      @foreach ($clientes as $cliente)
      <tr color="#fff">
            
            <td>{{ $cliente->nombre }}</td>
          <td> {{ $cliente->cedula }}</td>         
      </tr>
      @endforeach
      </table>
    </div>
</div>
</body>
</html>