@if ($submitButtonText == 'Añadir Ingrediente')
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
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif

@if ($submitButtonText == 'Añadir Comida')

<div class="form-group">
	{!! Form::label('nombre', 'Nombre:') !!}
	<!-- atributo, default, otro aributo -->
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('descripcion', 'descripcion:') !!}
	{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('precio', 'Precio:') !!}
	{!! Form::text('precio', null, ['class' => 'form-control']) !!}
</div>

	<!-- Añade comida -->
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif