@extends('app')

@section('content')

@include ('partials.modals')


<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> COMIDAS Y BEBIDAS DE MI COMIDA PREDILECTA </h2>
    {{Html::ul($errors->all())}}
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
        @foreach($comidas as $key => $comida)  
		<tr>
		      <td>
            <a title="Presiona para editar" href="{{ url('/comida/'. $comida->id. '/edit') }}">{{ $comida->nombre }}
          </td>
		      <td> {{ $arreglo[$key]->cant_posible }} </td>
          <td> {{ $comida->precio }}</td>
          <td> {{ $comida->descripcion }}</td> 
          <td>
         	<ul>
				    @foreach ($comida->comidaIngredientes as $ingrediente)

					   <li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
				    @endforeach
			     </ul>
		      </td>	
          <td>
          <a href="{{route('comida.show',$comida->id)}}"> Ver Comida</a>
            {{ Form::open(['method' => 'DELETE','route' => ['comida.destroy', $comida->id],'style'=>'display:inline'])}}
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
    $('#myTable').DataTable(
      {

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }});
  });
</script>

@endsection