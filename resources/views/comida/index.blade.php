@extends('app')

@section('content')

@include ('partials.modals')


<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> COMIDAS Y BEBIDAS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfComida') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>

      <table class="highlight" id="myTable">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Precio</th>
			  <th>Descripcion</th>
			  <th>Ingredientes</th>
			  <th>Acción</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($comidas as $comida)
		<tr>
		  <td>
            <a href="{{ url('/comida', $comida->id) }}">{{ $comida->nombre }}
          </td>
		  <td> query </td>
          <td> {{ $comida->precio }}</td>
         <td> {{ $comida->descripcion }}</td> 
         <td>
         	<ul>
				@foreach ($comida->comidaIngredientes as $ingrediente)

					<li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
				@endforeach
			</ul>
		 </td>	

          <td><a class='dropdown-button btn orange darken-2' href='#' data-activates='Accion'>Acción</a>
				  <!-- Sub Menu Accion -->
			     <ul id='Accion' class='dropdown-content'>
				      <li><a href="{{url('comida/'.$comida->id.'/edit')}}" class="orange-text">Modificar</a></li>
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
    $('#myTable').DataTable();
  });
</script>

@endsection