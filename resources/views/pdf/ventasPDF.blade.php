<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte: VENTAS</title>
    <link rel="stylesheet" type="text/css" href="public/css/yepezchecheeche.css">
  </head>
<body>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> VENTAS DE MI COMIDA PREDILECTA </h2>

      <br>

      <br>
      <br>

      <table width="600px" cellpadding="5px" cellspacing="5px" style="text-align:center">
      <tr >
             <th>Código</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Forma de Pago</th>
            <th>IVA</th>
            <th>Total</th>
            <th>Número de Mesa</th>
            <th>Llevar</th>
            <th>CI del Empleado</th>
            <th>ID del Comprador</th>
            <th>Compra</th>
      </tr>
      @foreach ($ventas as $venta)
      <tr color="#fff" >
            
          <td>{{ $venta->id }}</td>
          <td> {{ $venta->created_at }}</td>
          <td> {{ $venta->subtotal }}</td>
          <td> {{ $venta->forma_pago }}</td>
          <td> {{ $venta->iva }}</td>
          <td> {{ $venta->total }}</td>
          @if($venta->numero_mesa == null)
            <td>Sin mesa</td>
          @endif
          @if($venta->numero_mesa != null)
            <td> {{ $venta->numero_mesa }}</td>
          @endif
          @if($venta->llevar == false)
            <td>No</td>
          @elseif ($venta->llevar == true)
            <td>Sí</td>
          @endif  
          <td> {{ $venta->ci_user }}</td>
          <td> {{ $venta->id_cliente }}</td>
          <td>
          <ul>
            @foreach ($venta->comidaVenta as $comida)

             <li> {{ $comida->cantidad }} {{ $comida->comida->nombre }} </li>
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