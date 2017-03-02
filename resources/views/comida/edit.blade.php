@extends('app')


@section('content')

	<h1>Editar: {!! $comida->nombre !!}</h1>

	{!! Form::model($comida, ['method' => 'PATCH', 'action' => ['ComidaController@update', $comida->id]]) !!}

		@include ('partials.form', ['submitButtonText' => 'Actualizar Comida'])

	{!! Form::close() !!}

	@include ('errors.list')


@stop