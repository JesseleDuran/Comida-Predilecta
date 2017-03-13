@extends('app')

@section('content')
@include ('partials.modals')

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
	  <h2 style="text-align:center"> MESAS DE MI COMIDA PREDILECTA </h2>

    



      {{Html::ul($errors->all())}}

      
      <br>
      <br>
      <table class="highlight" id="myTable">
        <thead>
            <th>Numero</th>
            <th>Estado</th>
            <th>Acción</th>
        </thead>
        <tbody>
        @for ($i = 0; $i < sizeof($mesas); $i++)	
		<tr>
		  <td>{{$i+1}} </td>
          
					@if($mesas[$i]->estado == false)
						<td>Desocupada</td>
					@elseif ($mesas[$i]->estado == true)
						<td>Ocupada</td>
					@endif	
         	<td> 
            {{ Form::open(['method' => 'DELETE','route' => ['mesa.destroy', $mesas[$i]->id],'style'=>'display:inline'])}}
            {{ Form::submit('Eliminar')}}
            {{ Form::close()}}
		    </td>
		</tr>
		@endfor
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




