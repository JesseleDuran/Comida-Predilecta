@extends('app')

@section('content')

	<h1>{{ $user->nombre }}</h1>

	<hr/>

		<article>
			Cantidad: {{$user->cedula}}
		</article>
		<div class="precio">Precio:{{ $user->telefono }}</div>
		<div class="precio">Direccion:{{ $user->direccion }}</div>
		<div class="precio">Registrado en:{{ $user->created_at }}</div>


@stop