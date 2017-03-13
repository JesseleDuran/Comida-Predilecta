@extends('appUser')
@section('content')

<div class="section no-pad-bot grey lighten-3" id="index-banner">
          <div class="container">
      <br><br>
      


      <table class="bordered highlight" id="myTable">
        <thead>
          <tr>
              <th data-field="id">Numero de Venta</th>
              <th data-field="name">Fecha</th>
              <th data-field="price">Monto de Venta</th>
          </tr>
        </thead>

        <tbody>
        	@foreach ($ventas as $venta)
          <tr>
            <td> {{ $venta->id }}</td>
            <td> {{ $venta->created_at }}</td>
            <td> {{ $venta->total }}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

      <br><br>

    </div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col 20 s12">
          <h5 class="white-text">¡Danos lo MEJOR de ti!</h5>
          <p class="grey-text text-lighten-4">Todas las operaciones realizadas son respaldadas en un registro privado.</p>
        </div>
      </div>
    </div>
      
      
      <!--  Copyright-->
  </footer>


@stop

@section('scripts')

<script>

  $(document).ready(function(){
    $('.modal').modal();
    $('#myTable').DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }}
      );

  });
</script>

@endsection