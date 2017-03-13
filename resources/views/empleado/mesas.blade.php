@extends('appUser')
@section('content')


<div class="section no-pad-bot  grey lighten-3" id="index-banner">
      
      <div class="containerM">
        
        <br><br>
      
        <div class="row">

        @for ($i = 0; $i < sizeof($mesas); $i++)

        	@if($mesas[$i]->estado == FALSE)
            
          		<div class="left col s12 m3">
                	<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width grey lighten-3">
                  		<li class="tab left col s8"><a class="active" href="#mesa{{$mesas[$i]->id}}libre" class="black-text">Desocupada</a></li>
                  		<li class="tab left col s4"><a target="_self" href="{{ url('/empleado/'. $mesas[$i]->id. '/food') }}#mesa{{$mesas[$i]->id}}" >M#{{$mesas[$i]->id}}</a></li>
                	</ul>
                	<div id="mesa{{$mesas[$i]->id}}libre" class="col s12 grey lighten-3"><img src="/images/mesa.png"></div>
                	<div id="mesa{{$mesas[$i]->id}}" class="col s12 grey lighten-3"><img src="/images/mesaoff.png"></div>
            	</div>
          @else

            	<div class="left col s12 m3">
                	<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width grey lighten-3">
                  		<li class="tab left col s8"><a href="#mesa{{$mesas[$i]->id}}libre" class="black-text" onclick="cambiarEstado({{$mesas[$i]->id}})">Desocupada</a></li>
                  		<li class="tab left col s4"><a class="active" target="_self" >M#{{$mesas[$i]->id}}</a></li>
                	</ul>
                	
                	<div id="mesa{{$mesas[$i]->id}}" class="col s12 grey lighten-3"><img src="/images/mesaoff.png"></div>
            	</div>
          @endif	         

		    @endfor            
  
            <div class="float  col s12 m5 right">
                <br><br>
                <a class="waves-effect waves-light btn-large teal" href="{{ url('/empleado/'. 'llevar'. '/comida') }}"><i class="material-icons left">navigation</i>Llevar</a>
            </div>
      
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
      
  </div>
     
      <!--  Copyright-->
  </footer>

@stop

@section('scripts')


<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function cambiarEstado(id) 
  {
      $.ajax({
      url: '/cambiarEstadoMesa',
      type: 'POST',
      data: {_token: CSRF_TOKEN, mesa:id},
      dataType: 'JSON',
      success: function (data)
      {
        if(data.msg)
          Materialize.toast(data.msg, 3000, 'red rounded');
        else
        {
          location.reload();
        }
      }});
  }
</script>

@endsection
