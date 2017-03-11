@if ($submitButtonText == 'Añadir Ingrediente' || $submitButtonText == 'Actualizar Ingrediente')
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
@if ($errors->any())  
<div class="form-group" onclick="Materialize.toast('ERROR', 4000)">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
@else
<div class="form-group" onclick="Materialize.toast('Su ingrediente ha sido añadido', 3000)">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
@endif


@endif

@if ($submitButtonText == 'Añadir Comida' || $submitButtonText == 'Actualizar Comida')

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

<div class="col m12">
        <div class="col m6">
              <h4>Ingredientes</h4>
        </div>
        <div class="col m6">
          <a class="waves-effect waves-light btn" id="add_ingrediente" name="add_ingrediente">Añadir Ingrediente</a>
        </div>
      </div>
     <div class="row" id="ingrediente_wrapper">
        <div class="row">
          <p class="col m2">Ingredientes:</p>
  				    <select name="ingrediente_id[0]" id='ingrediente_id[0]'>
       					@foreach ($ingredientes as $in)
                			<option value="{{$in->id}}">{{$in->nombre}}</option>
              	@endforeach
            		</select>
          <p class="col m2">Cantidad:</p>
          <input class="col m2" type="number"  name="cantidad[0]" id='cantidad[0]'>
          <a href="#" class="col m2 remove_field">Remove</a>
        </div>
</div>

	<!-- Añade comida -->
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif

@if ($submitButtonText == 'Añadir Combo'|| $submitButtonText == 'Actualizar Combo')

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

<div class="col m12">
        <div class="col m6">
              <h4>comidas</h4>
        </div>
        <div class="col m6">
          <a class="waves-effect waves-light btn" id="add_comida" name="add_comida">Añadir comida</a>
        </div>
      </div>
     <div class="row" id="comida_wrapper">
        <div class="row">
          <p class="col m2">comidas:</p>
              <select name="comida_id[0]" id='comida_id[0]'>
                @foreach ($comidas as $in)
                      <option value="{{$in->id}}">{{$in->nombre}}</option>
                    @endforeach
                </select>
          <p class="col m2">Cantidad:</p>
          <input class="col m2" type="number"  name="cantidad[0]" id='cantidad[0]'>
          <a href="#" class="col m2 remove_field">Remove</a>
        </div>
</div>

  <!-- Añade comida -->
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif

@if ($submitButtonText == 'Añadir Mesa')

  <!-- Añade ingrediente -->
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif

@if ($submitButtonText == 'Añadir Cliente' || $submitButtonText == 'Actualizar Cliente')
<div class="form-group">
  {!! Form::label('nombre', 'Nombre:') !!}
  <!-- atributo, default, otro atributo -->
  {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('cedula', 'cedula:') !!}
  {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

  <!-- Añade ingrediente -->
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@endif


@if ($submitButtonText == 'Actualizar Iva')
<div class="form-group">
  {!! Form::label('iva', 'IVA(%):') !!}
  <!-- atributo, default, otro aributo -->
  {!! Form::text('iva', null, ['class' => 'form-control']) !!}
</div>

  <!-- Añade ingrediente -->
@if ($errors->any())  
<div class="form-group" onclick="Materialize.toast('ERROR', 4000)">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
@else
<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
@endif


@endif



