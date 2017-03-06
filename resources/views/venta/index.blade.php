@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> VENTAS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfVenta') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>
      <table class="highlight" id="myTable">
        <thead>
            <th>Realizada en:</th>
            <th>IVA</th>
            <th>SubTotal</th>
            <th>Total</th>
            <th>Número de Mesa</th>
            <th>Llevar</th>
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
    $('#myTable').DataTable();
  });
</script>

@endsection




