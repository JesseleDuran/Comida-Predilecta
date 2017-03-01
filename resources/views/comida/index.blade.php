@extends('app')

@section('content')

	<h1>Comidas</h1>

	<hr/>

	@foreach ($comidas as $comida)
		<article>
			<h2>

				<a href="{{ url('/comida', $comida->id) }}">
					{{ $comida->nombre }}</a>
			</h2>

			<div class="cantidad">Cantidad:{{ $comida->cantidad }}</div>
			<div class="precio">Precio:{{ $comida->precio }}</div>

		</article>
	@endforeach

@stop