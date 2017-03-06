@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> IVAS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfIvas') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>
      <table class="highlight" id="myTable">
        <thead>
            <th>Tipo de Pago</th>
            <th>IVA (%)</th>
        </thead>
        <tbody>
        @foreach ($ivas as $iva)
		    <tr>
		      <td>
            <a href="{{ url('/ivas/'. $iva->id. '/edit') }}">{{ $iva->tipo_pago }}</a>
          </td>
          <td> {{ $iva->iva }}</td>
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




