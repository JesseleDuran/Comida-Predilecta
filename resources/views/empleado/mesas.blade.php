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
                  		<li class="tab left col s8"><a class="active" href="#mesa{{$i+1}}libre" class="black-text">Desocupada</a></li>
                  		<li class="tab left col s4"><a target="_self" href="{{ url('/empleado/'. $mesas[$i]->id. '/food') }}#mesa{{$i+1}}">M#{{$i+1}}</a></li>
                	</ul>
                	<div id="mesa{{$i+1}}libre" class="col s12 grey lighten-3"><img src="/images/mesa.png"></div>
                	<div id="mesa{{$i+1}}" class="col s12 grey lighten-3"><img src="/images/mesaoff.png"></div>
            	</div>
          @else

            	<div class="left col s12 m3">
                	<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width grey lighten-3">
                  		<li class="tab left col s8"><a href="#mesa{{$i+1}}libre" class="black-text">Desocupada</a></li>
                  		<li class="tab left col s4"><a class="active" target="_self" href="{{ url('/empleado/'. $mesas[$i]->id. '/food') }}#mesa{{$i+1}}">M#{{$i+1}}</a></li>
                	</ul>
                	<div id="mesa{{$i+1}}libre" class="col s12 grey lighten-3"><img src="/images/mesa.png"></div>
                	<div id="mesa{{$i+1}}" class="col s12 grey lighten-3"><img src="/images/mesaoff.png"></div>
            	</div>
          @endif	         

		    @endfor            
  
            <div class="float  col s12 m5 right">
                <br><br>
                <a class="waves-effect waves-light btn-large teal" href="Food.html"><i class="material-icons left">navigation</i>Llevar</a>
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

