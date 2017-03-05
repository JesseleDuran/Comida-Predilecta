@extends('app')

@section('content')

	<h1>Crear una Venta</h1>
	
	<hr/>

	{!! Form::open(['url' => 'venta']) !!}
		@include ('partials.form', ['submitButtonText' => 'Realizar Venta'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop