@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> INGREDIENTES DE MI COMIDA PREDILECTA </h2>
      
      <table class="highlight">
        <thead>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
			<th>Acción</th>
        </thead>
        <tbody>
        @foreach ($ingredientes as $ingrediente)
		<tr>
		  <td>
            <a href="{{ url('/ingrediente', $ingrediente->id) }}">{{ $ingrediente->nombre }}</a>
          </td>
		  <td> {{ $ingrediente->cantidad }}</td>
          <td> {{ $ingrediente->precio }}</td>
          <td>  <div class="input-field col s6">
				<select>
				  <option value="" disabled selected>Seleccion una Accion</option>
				  <option value="1">Modificar</option>
				  <option value="2">Eliminar</option>
				</select>
			  </div>
		  </td>
		</tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>
	


@stop





