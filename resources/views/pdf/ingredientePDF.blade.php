<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte: INGREDIENTES</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
    <h2 style="text-align:center">Reporte de Ingredientes de MI COMIDA PREDILECTA a la fecha: 5/03/2017 </h2>  
	  <br>
    <h3 style="text-align:center"> Ingredientes de MI COMIDA PREDILECTA </h3>
      <br>

      <table width="500px" cellpadding="5px" cellspacing="5px" style="text-align:center">
      <tr >
              <th  data-field="name">Nombre</th>
              <th  data-field="cantidad">Cantidad</th>
              <th  data-field="price">Precio</th>
      </tr>
      @foreach ($ingredientes as $ingrediente)
      <tr color="#fff">
            
            <td>{{ $ingrediente->nombre }}</td>
            <td> {{ $ingrediente->cantidad }}</td>
            <td> {{ $ingrediente->precio }}</td>           
      </tr>
      @endforeach
      </table>
    </div>
</div>
</body>
</html>