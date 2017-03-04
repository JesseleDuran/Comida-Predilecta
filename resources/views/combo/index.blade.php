@extends('app')

@section('content')

@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> COMBOS DE MI COMIDA PREDILECTA </h2>
      <table class="highlight">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Precio</th>
			  <th>Descripcion</th>
			  <th>Comidas</th>
			  <th>Acción</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($combos as $combo)
		<tr>
		  <td>
            <a href="{{ url('/combo', $combo->id) }}">{{ $combo->nombre }}
          </td>
		  <td> query más largo </td>
          <td> {{ $combo->precio }}</td>
         <td> {{ $combo->descripcion }}</td> 
         <td>
         	<ul>
				@foreach ($combo->comidaCombo as $comida)

					<li>{{ $comida->comida->nombre }} ({{ $comida->cantidad }})</li>
				@endforeach

			</ul>
		 </td>	

          <td><a class='dropdown-button btn orange darken-2' href='#' data-activates='Accion'>Acción</a>
				  <!-- Sub Menu Accion -->
			     <ul id='Accion' class='dropdown-content'>
				      <li><a href="{{url('combo/'.$combo->id.'/edit')}}" class="orange-text">Modificar</a></li>
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

  @section('scripts')

<script>

  $(document).ready(function(){
    $('.modal').modal();
  });
</script>

@endsection