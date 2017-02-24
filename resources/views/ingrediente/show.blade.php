@extends('app')

@section('content')

	<h1>{{ $ingrediente->nombre }}</h1>

	<hr/>

		<article>
			Cantidad: {{$ingrediente->cantidad}}
		</article>
		<div class="precio">Precio:{{ $ingrediente->precio }}</div>


@stop