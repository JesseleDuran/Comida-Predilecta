
@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> CLIENTES DE MI COMIDA PREDILECTA </h2>
      
      <table class="highlight" id="myTable">
        <thead>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Acción</th>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
		<tr>
		  <td>
            <a href="{{ url('/cliente', $cliente->id) }}">{{ $cliente->nombre }}</a>
          </td>
          <td> {{ $cliente->cedula }}</td>
          <td><a class='dropdown-button btn orange darken-2' href='#' data-activates='Accion'>Accion</a>
				  <!-- Sub Menu Accion -->
			     <ul id='Accion' class='dropdown-content'>
				      <li><a href="{{url('cliente/'.$cliente->id.'/edit')}}" class="orange-text">Modificar</a></li>
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