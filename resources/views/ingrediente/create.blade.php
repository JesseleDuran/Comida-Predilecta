@extends('app')

@section('content')

	<h1>Ingrese un nuevo Ingrediente</h1>
	<hr/>

	{!! Form::open(['url' => 'ingrediente']) !!}

		<div class="form-group">
			{!! Form::label('nombre', 'Nombre:') !!}
			<!-- atributo, default, otro aributo -->
			{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('cantidad', 'Cantidad:') !!}
			{!! Form::text('cantidad', null, ['class' => 'form-control']) !!}

		</div>

		<div class="form-group">
			{!! Form::label('precio', 'Precio:') !!}
			{!! Form::text('precio', null, ['class' => 'form-control']) !!}

		</div>

		<!-- Añade ingrediente -->

		<div class="form-group">
			{!! Form::submit('Añadir Ingrediente', ['class' => 'btn btn-primary form-control']) !!}

		</div>

	{!! Form::close() !!}

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach	

		</ul>

	@endif

@stop