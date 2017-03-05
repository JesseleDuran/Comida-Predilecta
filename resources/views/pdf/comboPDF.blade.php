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
	  <h2 style="text-align:center"> COMBOS DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>

      <table width="680px" cellpadding="5px" cellspacing="5px" border="1">
      <tr >
              <th  data-field="name">Nombre</th>
              <th  data-field="cantidad">Cantidad</th>
              <th  data-field="price">Precio</th>
              <th  data-field="price">Descripcion</th>
              <th  data-field="price">Comidas</th>
      </tr>
      @foreach ($combos as $combo)
      <tr color="#fff" bgcolor="#00897B">           
            <td>{{ $combo->nombre }}</td>
            <td> query mas largo</td>
            <td>{{ $combo->precio }}</td>
            <td>{{ $combo->descripcion }}  </td> 
            <td>
            <ul>
            @foreach ($combo->comidaCombo as $comida)
              <li>{{ $comida->comida->nombre }} ({{ $comida->cantidad }})</li>
            @endforeach
            </ul>
            </td>              
      </tr>
      @endforeach
      </table>
    </div>
</div>
</body>
</html>