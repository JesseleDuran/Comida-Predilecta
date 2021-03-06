<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte: COMIDAS</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> COMIDAS Y BEBIDAS DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>

      <table width="680px" cellpadding="5px" cellspacing="5px" style="text-align:center">
      <tr >
              <th  data-field="name">Nombre</th>
              <th  data-field="cantidad">Cantidad</th>
              <th  data-field="price">Precio</th>
              <th  data-field="price">Descripcion</th>
              <th  data-field="price">Ingredientes</th>
      </tr>
      @foreach($comidas as $key => $comida)  
      <tr color="#fff" >
            
            <td>{{ $comida->nombre }}</td>
            <td> {{ $arreglo[$key]->cant_posible }}</td>
            <td>{{ $comida->precio }}</td>
            <td>{{ $comida->descripcion }}  </td> 
            <td>
            <ul>
            @foreach ($comida->comidaIngredientes as $ingrediente)
              <li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
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

