@extends('app')

@section('contenido')

	<h1>Registre un nuevo Empleado</h1>
	@include ('errors.list')
	<hr/>

	{!! Form::open(['url' => 'user']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Empleado'])
	{!! Form::close() !!}
	

@stop



