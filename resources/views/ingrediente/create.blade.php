@extends('app')

@section('content')

	<h1>Ingrese un nuevo Ingrediente</h1>
	
	<hr/>

	{!! Form::open(['url' => 'ingrediente']) !!}
		@include ('ingrediente.form', ['submitButtonText' => 'Añadir Ingrediente'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop