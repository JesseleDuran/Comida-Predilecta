@extends('app')

@section('content')
@include ('partials.modals')


<div class="container">
	<br><br>
	<h2 style="text-align:center"> HORAS CON MÁS VENTAS DE MI COMIDA PREDILECTA</h2>
	<br>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			<table id="datatable">
				<thead>
					<tr>
						<th></th>
						<th>Cantidad de ventas presenciales</th>
						<th>Cantidad de ventas para llevar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($horasVentasPresenciales as $venta)
					@foreach ($horasVentasLlevar as $ventaLlevar)
					<tr>
						<th>Hora: {{$venta->hora}}:00 del día</th>
						<td>{{$venta->suma_cantidad}}</td>
						<td>{{$ventaLlevar->suma_cantidad}}</td>
					</tr>
					@endforeach
					@endforeach
				</tbody>
			</table>
		<br>
		<br>
</div>

@stop


@section('scripts')

<script>


$(document).ready(function () 
		{

			Highcharts.chart('container', {
				data: {
					table: 'datatable'
				},
				chart: {
					type: 'column'
				},
				title: {
					text: 'Horas con más ventas'
				},
				yAxis: {
					allowDecimals: false,
					title: {
						text: 'Cantidad'
					}
				},
				
			});
		});


	$('.modal').modal();
    $('#myTable').DataTable();
</script>

@endsection
