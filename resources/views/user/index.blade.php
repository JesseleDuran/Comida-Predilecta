@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> EMPLEADOS DE MI COMIDA PREDILECTA </h2>

      <br>
      <a href="{{ url('/pdfEmpleados') }}"><button class="btn center waves-effect waves-light" type="submit" name="action">Descargar Reporte
      <i class="material-icons">insert_chart</i>  
      </button></a> 
      <br>
      <br>
      <table class="highlight" id="myTable">
        <thead>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Registrado en:</th>
			      <th>Acción</th>
        </thead>
        <tbody>
        @foreach ($users as $user)
		    <tr>
		      <td>
            <a href="{{ url('/user/'. $user->id. '/edit') }}">{{ $user->nombre }}</a>
          </td>
		      <td> {{ $user->cedula }}</td>
          <td> {{ $user->telefono }}</td>
          <td> {{ $user->direccion }}</td>
          <td> {{ $user->created_at }}</td>
          <td>
            <a href="{{route('user.show',$user->cedula)}}"> Ver user</a>
            {{ Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->cedula],'style'=>'display:inline'])}}
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




