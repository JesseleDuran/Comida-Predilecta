@extends('app')

@section('content')

	<h1>{{ $cliente->nombre }}</h1>

	<hr/>

		<article>
			Nombre: {{$cliente->nombre}}
		</article>
		<div class="precio">Cédula:{{ $cliente->cedula }}</div>


@stop