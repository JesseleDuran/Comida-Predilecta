@extends('app')

@section('content')
@include ('partials.modals')


<div class="container">
	<br><br>
	<h2 style="text-align:center"> COMIDAS MÁS VENDIDAS DE MI COMIDA PREDILECTA</h2>
	<br>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			<table id="datatable">
				<thead>
					<tr>
						<th></th>
						<th>Cantidad de veces vendidas</th>
						</tr>
				</thead>
				<tbody>
					@foreach ($comidasVendidas as $comida)
					<tr>
						<th>{{$comida->nombre}}</th>
						<td>{{$comida->suma_cantidad}}</td>
					</tr>
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
					text: 'Comidas más vendidas'
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
