@extends('app')

@section('content')

	<h1>{{ $comida->nombre }}</h1>

	<hr/>

		<article>
			Descripcion: {{$comida->descripcion}}
		</article>
		<div class="precio">Precio:{{ $comida->precio }}</div>
		<h5>Ingredientes:</h5>
		@foreach ($comida->comidaIngredientes as $ingrediente)

			<li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
		@endforeach

		<article>
			Cantidad: {{$comida->descripcion}}
		</article>

@stop