@extends('app')

@section('content')

	<h1>Combos</h1>

	<hr/>

	@foreach ($combos as $combo)
		<article>
			<h2>

				<a href="{{ url('/combo', $combo->id) }}">
					{{ $combo->nombre }}</a>
			</h2>

			<div class="cantidad">Cantidad: query más largo</div>
			<div class="precio">Precio:{{ $combo->precio }}</div>
			<div class="descripcion">Descripcion:{{ $combo->descripcion }}</div>

			<h5>Comidas:</h5>
			<ul>
				@foreach ($combo->comidaCombo as $comida)

					<li>{{ $comida->comida->nombre }} ({{ $comida->cantidad }})</li>
				@endforeach

			</ul>

		</article>
	@endforeach

@stop