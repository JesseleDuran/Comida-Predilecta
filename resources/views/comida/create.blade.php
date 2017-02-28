@extends('app')

@section('content')

	<h1>Ingrese una nueva Comida</h1>
	
	<hr/>

	{!! Form::open(['url' => 'comida']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Comida'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop