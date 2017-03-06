@extends('app')


@section('content')

	<h1>Editar: {!! $iva->tipo_pago !!}</h1>

	{!! Form::model($iva, ['method' => 'PATCH', 'action' => ['IvasController@update', $iva->id]]) !!}

		@include ('partials.form', ['submitButtonText' => 'Actualizar Iva'])

	{!! Form::close() !!}

	@include ('errors.list')


@stop