@extends('app')

@section('content')

	<h1>Ingredientes</h1>

	<hr/>

	@foreach ($ingredientes as $ingrediente)
		<article>
			<h2>

				<a href="{{ url('/ingrediente', $ingrediente->id) }}">
					{{ $ingrediente->nombre }}</a>
			</h2>

			<div class="cantidad">Cantidad:{{ $ingrediente->cantidad }}</div>
			<div class="precio">Precio:{{ $ingrediente->precio }}</div>

		</article>
	@endforeach

@stop