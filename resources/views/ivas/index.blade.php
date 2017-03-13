@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> IVA DE MI COMIDA PREDILECTA </h2>
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
            <a title="Presiona para editar" href="{{ url('/ivas/'. $iva->id. '/edit') }}">{{ $iva->tipo_pago }}</a>
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
    $('#myTable').DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }});
  });
</script>

@endsection




