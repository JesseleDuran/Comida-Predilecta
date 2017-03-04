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
          <td><a class='dropdown-button btn orange darken-2' href='#' data-activates='Accion'>Accion</a>
				  <!-- Sub Menu Accion -->
			     <ul id='Accion' class='dropdown-content'>
				      <li><a href="{{url('ingrediente/'.$ingrediente->id.'/edit')}}" class="orange-text">Modificar</a></li>
				      <li><a href="#URL PA ELIMINAR" class="orange-text">Eliminar</a></li>
			     </ul>
		    </td>
		</tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>
	


@stop





