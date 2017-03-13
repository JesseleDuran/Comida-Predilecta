@extends('app')

@section('content')
@include ('partials.modals')


<div class="container">
	<br><br>
	<h2 style="text-align:center"> MESAS CON MÁS VENTAS DE MI COMIDA PREDILECTA</h2>
	<br>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			<table id="datatable">
				<thead>
					<tr>
						<th></th>
						@foreach ($mesasVentas as $mesa)
						<th>Cantidad de ventas en la Mesa {{$mesa->id}}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>

					
					<tr>
						<th>Cantidad</th>
						@foreach ($mesasVentas as $mesa)
						<td>{{$mesa->suma_cantidad}}</td>
						@endforeach
					</tr>
					
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
					text: 'Mesas con más ventas'
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
