@extends('app')


@section('content')

	<h1>Editar: {!! $ingrediente->nombre !!}</h1>

	{!! Form::model($ingrediente, ['method' => 'PATCH', 'action' => ['IngredienteController@update', $ingrediente->id]]) !!}

		@include ('partials.form', ['submitButtonText' => 'Actualizar Ingrediente'])

	{!! Form::close() !!}

	@include ('errors.list')


@stop