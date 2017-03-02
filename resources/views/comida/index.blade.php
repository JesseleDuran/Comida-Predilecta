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

			<div class="cantidad">Cantidad: query </div>
			<div class="precio">Precio:{{ $comida->precio }}</div>
			<div class="precio">Descripcion:{{ $comida->descripcion }}</div>

			<h5>Ingredientes:</h5>
			<ul>
				@foreach ($comida->comidaIngredientes as $ingrediente)

					<li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
				@endforeach



			</ul>

		</article>
	@endforeach

@stop