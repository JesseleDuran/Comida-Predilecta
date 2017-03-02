@extends('app')

@section('content')

	<h1>Clientes</h1>

	<hr/>

	@foreach ($clientes as $cliente)
		<article>
			<h2>

				<a href="{{ url('/cliente', $cliente->id) }}">
					{{ $cliente->nombre }}</a>
			</h2>

			<div class="nombre">nombre:{{ $cliente->nombre }}</div>
			<div class="cedula">cedula:{{ $cliente->cedula }}</div>

		</article>
	@endforeach

@stop