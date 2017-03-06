@extends('app')


@section('content')

	<h1>Editar: {!! $cliente->nombre !!}</h1>

	{!! Form::model($cliente, ['method' => 'PATCH', 'action' => ['ClienteController@update', $cliente->id]]) !!}

		@include ('partials.form', ['submitButtonText' => 'Actualizar Cliente'])

	{!! Form::close() !!}

	@include ('errors.list')


@stop