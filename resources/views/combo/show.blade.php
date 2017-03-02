@extends('app')

@section('content')

	<h1>{{ $combo->nombre }}</h1>

	<hr/>

		<article>
			Descripcion: {{$combo->descripcion}}
		</article>
		<div class="precio">Precio:{{ $combo->precio }}</div>
		<h5>Comidas:</h5>
		<ul>
				@foreach ($combo->comidaCombo as $comida)

					<li>{{ $comida->comida->nombre }} ({{ $comida->cantidad }})</li>
				@endforeach

			</ul>

		<article>
			Cantidad: bulda de query
		</article>

@stop