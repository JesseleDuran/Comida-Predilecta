@extends('app')

@section('content')

	<h1>Editar: {!! $combo->nombre !!}</h1>>
	
	<hr/>

	{!! Form::model($combo, ['method' => 'PATCH', 'action' => ['ComboController@update', $combo->id]]) !!}

	{!! Form::open(['url' => 'combo']) !!}
		@include ('partials.form', ['submitButtonText' => 'Actualizar Combo'])
	{!! Form::close() !!}

	@include ('errors.list')

@stop


