@extends('app')


@section('content')

	<h1>Editar Venta número: {!! $venta->id !!}</h1>
	@include ('errors.list')
	{!! Form::model($venta, ['method' => 'PATCH', 'action' => ['VentaController@update', $venta->id]]) !!}

		@include ('partials.form', ['submitButtonText' => 'Actualizar Venta'])

	{!! Form::close() !!}

	


@stop