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
							<th>Combo 1</th>
							<th>Combo 2</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Mesa 1</th>
							<td>3</td>
							<td>4</td>
						</tr>
						<tr>
							<th>Mesa 2</th>
							<td>2</td>
							<td>0</td>
						</tr>
						<tr>
							<th>Mesa 3</th>
							<td>5</td>
							<td>11</td>
						</tr>
						<tr>
							<th>Mesa 4</th>
							<td>1</td>
							<td>1</td>
						</tr>
						<tr>
							<th>Mesa 5</th>
							<td>2</td>
							<td>4</td>
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
</script>

@endsection
