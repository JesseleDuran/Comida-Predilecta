@extends('app')

@section('content')

	<h1>Ingrese un nuevo Cliente</h1>
	
	<hr/>

	{!! Form::open(['url' => 'cliente']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Cliente'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop