@extends('app')

@section('content')

@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> COMBOS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfCombo') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
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
			  <th>Comidas</th>
			  <th>Acción</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($combos as $key => $combo)
		<tr>
		  <td>
            <a title="Presiona para editar" href="{{ url('/combo/'. $combo->id. '/edit') }}">{{ $combo->nombre }}
          </td>
		  <td> {{$arreglo[$key]}} </td>
          <td> {{ $combo->precio }}</td>
         <td> {{ $combo->descripcion }}</td> 
         <td>
         	<ul>
				@foreach ($combo->comidaCombo as $comida)

					<li>{{ $comida->comida->nombre }} ({{ $comida->cantidad }})</li>
				@endforeach

			</ul>
		 </td>	

          <td>
            <a href="{{route('combo.show',$combo->id)}}"> Ver Combo</a>
            {{ Form::open(['method' => 'DELETE','route' => ['combo.destroy', $combo->id],'style'=>'display:inline'])}}
            {{ Form::submit('Eliminar')}}
            {{ Form::close()}}
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