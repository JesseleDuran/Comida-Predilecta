<nav>
  <div class="nav-wrapper orange darken-2">
    <a href="#!" class="brand-logo center orange darken-2"><i class="material-icons">loyalty</i>Mi Comida Predilecta</a> 
	
	<!--<a href="#desconex" class="right hide-on-med-and-down">Salir<img src="logout.png" width="32px" height="32px"></a> -->
	
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

    <ul class="dropdown-menu" role="menu">
        <li>
        <a href="{{ route('logout') }}"
        	onclick="event.preventDefault();
        	document.getElementById('logout-form').submit();">
             Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
         </form>
         </li>
    </ul>
   
</nav>
<!-- Desconex -->
	<div id="desconex" class="modal">
		<div class="modal-content">
		  <div class="row" style="text-align:center">
			<h4>¿Desea Salir?</h4>
			  <a href="#!" class=" modal-action modal-close waves-effect waves-orange btn-flat">Si</a>
			  <a href="#!" class="  modal-action modal-close waves-effect waves-orange btn-flat">No</a>					
		  </div>
		</div>	
	</div>	
    <ul id="nav-mobile" class="side-nav fixed orange darken-2">        
    <ul class="collapsible collapsible-accordion">
			<li class="bold"><a href="{{ url('/index') }}" class="waves-effect waves-white">Inicio</a></li>	
            <li class="bold"><a class="collapsible-header waves-effect waves-white ">Inventario</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                    <li ><a href="{{ url('/ingrediente') }}" >Ingredientes</a></li>
                  <li><a href="{{ url('/comida') }}" class="orange-text">Comidas y Bebidas</a></li>
                  <li><a href="{{ url('/combo') }}">Combos</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header  waves-effect waves-white">Administrar</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                  <li><a href="{{ url('/user') }}">Empleados</a></li>
                  <li><a href="{{ url('/venta') }}">Ventas</a></li>
                  <li><a href="{{ url('/cliente') }}">Clientes</a></li>
                  <li><a href="{{ url('/mesa') }}">Mesas</a></li>
                  <li><a href="{{ url('/ivas') }}">Iva</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-white">Estadisticas</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                  <li><a href="{{ url('/ComidasVendidas') }}">Comidas mas vendidas</a></li>
                  <li><a href="{{ url('/CombosVendidos') }}">Combos mas vendidos</a></li>
                  <li><a href="{{ url('/MesasVentas') }}">Mesas con más ventas</a></li>
                  <li><a href="{{ url('/HorasVentas') }}">Horas con más ventas</a></li>
                  <li><a href="{{ url('/DiasVentas') }}">Dia con más ventas</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="bold"><a href="Respaldo.html" class="waves-effect waves-white">Generar Respaldo</a></li>
        
        </ul>
 <nav>
    <div class="nav-wrapper white">
		
      <ul id="nav-mobile" class="right hide-on-med-and-down white">

        <li><a class='dropdown-button btn orange darken-2' href='#' data-activates='Agregar'>Agregar</a></li>
		
      </ul>

	  <!-- Sub Menu Agregar -->
	  <ul id='Agregar' class='dropdown-content'>
		<li><a data-target="modal1" href="#modal1" class="orange-text">Ingrediente</a></li>
		<li><a href="{{ url('/comida/create') }}" class="orange-text">Comida, Bebida</a></li>
		<li><a href="{{ url('/combo/create') }}" class="orange-text">Combo</a></li>		
		<li class="divider"></li>
		<li><a href="#modal4" class="orange-text">Empleado</a></li>
		<li><a href="#modal5" class="orange-text">Mesa</a></li>
	  </ul>
  </nav>
<!--- Ventanas de Agregar -->
<!-- Ingrediente -->
	  <div id="modal1" class="modal">
		<div class="modal-content">
			  <h4>Agregar Ingrediente</h4>
				{!! Form::open(['url' => 'ingrediente']) !!}
					@include ('partials.form', ['submitButtonText' => 'Añadir Ingrediente'])
				{!! Form::close() !!}

				@include ('errors.list')	  	

			  <a href="#!" class=" modal-action modal-close waves-effect waves-orange btn-flat" >Cancelar</a>			  
		</div>
	</div>
</div>

<!-- Empleado -->
	<div id="modal4" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <h4>Agregar Empleado</h4>
		    <div class="row">
				<form class="col s12">
				  <div class="row">
						<div class="input-field col s6">
						  <input placeholder="C.I" id="cedula" type="text" class="validate">
						  <label for="cedula">Cedula de Identidad</label>
						</div>
						<div class="input-field col s6">
						  <input id="Nombre" type="text" class="validate">
						  <label for="Nombre">Nombre</label>
						</div>
					  </div>				  
					  <div class="row">
						<div class="input-field col s8">
						  <input id="Clave" type="password" class="validate">
						  <label for="Clave">Clave</label>
						</div>
					  </div>
						<div class="input-field col s8">
						  <input placeholder="Ingrese Numero de Teléfono" id="tlf" type="text" class="validate">
						  <label for="tlf">Telefono</label>
						</div>
						<div class="input-field col s12">
						  <input placeholder="Dirección del Empleado" id="adress" type="text" class="validate">
						  <label for="adress">Direcci&oacuten</label>
						</div>
				</form>
			</div>
		</div>	
			<div class="modal-footer">			
			  <a href="#!" class=" modal-action modal-close waves-effect waves-orange btn-flat">Agregrar</a>
			  <a href="#!" class=" modal-action modal-close waves-effect waves-orange btn-flat">Cancelar</a>			  
			</div>
	</div>
<!-- MESA -->
	<div id="modal5" class="modal">
		<div class="modal-content">
		  <div class="row" style="text-align:center">
			<h4>¿Desea Agregar una mesa?</h4>
			<hr/>
				{!! Form::open(['url' => 'mesa']) !!}
					@include ('partials.form', ['submitButtonText' => 'Añadir Mesa'])
				{!! Form::close() !!}
				@include ('errors.list')
			  <a href="#!" class="  modal-action modal-close waves-effect waves-orange btn-flat">No</a>					
		  </div>
		</div>	
	</div>	