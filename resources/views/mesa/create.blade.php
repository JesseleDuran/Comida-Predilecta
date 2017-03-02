@extends('app')

@section('content')

	<h1>¿Estás seguro que deseas crear una mesa?</h1>
	
	<hr/>

	{!! Form::open(['url' => 'mesa']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Mesa'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop