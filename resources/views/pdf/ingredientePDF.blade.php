<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> INGREDIENTES DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>

      <table width="500px" cellpadding="5px" cellspacing="5px" border="1">
      <tr >
              <th  data-field="name">Nombre</th>
              <th  data-field="cantidad">Cantidad</th>
              <th  data-field="price">Precio</th>
      </tr>
      @foreach ($ingredientes as $ingrediente)
      <tr color="#fff" bgcolor="#00897B">
            
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