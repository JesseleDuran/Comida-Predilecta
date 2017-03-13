
@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> CLIENTES DE MI COMIDA PREDILECTA </h2>
      
      <br>
      <a href="{{ url('/pdfCliente') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>

      <table class="highlight" id="myTable">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Acción</th>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
		    <tr>
          <td> {{ $cliente->id }}</td>
		      <td>
            <a href="{{ url('/cliente/'. $cliente->id. '/edit') }}">{{ $cliente->nombre }}</a>
          </td>
          <td> {{ $cliente->cedula }}</td>
          <td>
            <a href="{{route('cliente.show',$cliente->id)}}"> Ver cliente</a>
            {{ Form::open(['method' => 'DELETE','route' => ['cliente.destroy', $cliente->id],'style'=>'display:inline'])}}
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
    $('#myTable').DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }});
  });
</script>

@endsection