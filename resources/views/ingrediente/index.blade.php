@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> INGREDIENTES DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdf') }}"><button class="btn center waves-effect waves-light" type="submit" name="action" target="_blank">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>
      <table class="highlight" id="myTable">
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
          <a href="{{ url('/ingrediente/'. $ingrediente->id. '/edit') }}">{{ $ingrediente->nombre }}</a>
          </td>
		      <td> {{ $ingrediente->cantidad }}</td>
          <td> {{ $ingrediente->precio }}</td>
          <td>
            <a href="{{route('ingrediente.show',$ingrediente->id)}}"> Ver Ingrediente</a>
            {{ Form::open(['method' => 'DELETE','route' => ['ingrediente.destroy', $ingrediente->id],'style'=>'display:inline'])}}
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
        }}
      );
  });
  
</script>

@endsection




