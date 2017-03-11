@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> VENTAS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfVenta') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>
      <table class="highlight" id="myTable">
        <thead>
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
			      <th>Acción</th>
        </thead>
        <tbody>
        @foreach ($ventas as $venta)
		    <tr>
		      <td>
            <a href="{{ url('/venta/'. $venta->id. '/edit') }}">{{ $venta->id }}</a>
          </td>
		      <td> {{ $venta->created_at }}</td>
          <td> {{ $venta->subtotal }}</td>
          <td> {{ $venta->forma_pago }}</td>
          <td> {{ $venta->iva }}</td>
          <td> {{ $venta->total }}</td>
          <td> {{ $venta->numero_mesa }}</td>
          @if($venta->llevar == false)
            <td>No</td>
          @elseif ($venta->llevar == true)
            <td>Sí</td>
          @endif  
          <td> {{ $venta->ci_user }}</td>
          <td> {{ $venta->id_cliente }}</td>
          <td>
            <a href="{{route('venta.show',$venta->id)}}"> Ver venta</a>
            {{ Form::open(['method' => 'DELETE','route' => ['venta.destroy', $venta->id],'style'=>'display:inline'])}}
            {{ Form::submit('Eliminar')}}
            {{ Form::close()}}
		      </td>
		    </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>
	

@stop

@section('scripts')

<script>

  $(document).ready(function(){
    $('.modal').modal();
    $('#myTable').DataTable();
  });
</script>

@endsection




