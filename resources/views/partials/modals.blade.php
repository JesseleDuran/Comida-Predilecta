<nav>
  <div class="nav-wrapper orange darken-2">
    <a href="#!" class="brand-logo center orange darken-2"><i class="material-icons">loyalty</i>Mi Comida Predilecta</a>   
  </div>
</nav>
    <ul id="nav-mobile" class="side-nav fixed orange darken-2">        
    <ul class="collapsible collapsible-accordion">
			<li class="bold"><a href="{{ url('/index') }}" class="waves-effect waves-white">Inicio</a></li>	
            <li class="bold"><a class="collapsible-header waves-effect waves-white ">Inventario</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                    <li ><a href="{{ url('/ingrediente') }}" >Ingredientes</a></li>
                  <li><a href="{{ url('/comida') }}" class="orange-text">Comidas y Bebidas</a></li>
                  <li><a href="Combos.html">Combos</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header  waves-effect waves-white">Administrar</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                  <li><a href="Empleados.html">Empleados</a></li>
                  <li><a href="Ventas.html">Ventas</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-white">Estadisticas</a>
              <div class="collapsible-body orange darken-1">
                <ul>
                  <li><a href="MasVendidoComida.html">Comidas mas vendidas</a></li>
                  <li><a href="MasVendidoCombo.html">Combos mas vendidos</a></li>
                  <li><a href="MenosVendidoCombo.html">Combos menos vendidos</a></li>
                  <li><a href="MasVendidoMesa.html">Mesas con más ventas</a></li>
                  <li><a href="PredilectaHora.html">Horas Predilectas</a></li>
                  <li><a href="PredilectaDiaMes.html">Dia del mes Predilecto</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="bold"><a href="Reporte.html" class="waves-effect waves-white">Generar Reporte</a></li>
        <li class="bold"><a href="Respaldo.html" class="waves-effect waves-white">Generar Respaldo</a></li>
        <li class="bold"><a href="Mesas.html" class="waves-effect waves-white">Trabajar como Vendedor</a></li>
        </ul>
 <nav>
    <div class="nav-wrapper white">
		<li class="brand-logo center">
			  <form>
				<div class="input-field">
				  <input id="search" placeholder="Buscar..." type="search" required>
				  <label class="label-icon"  for="search"><i class="material-icons">search</i></label>
				  <i class="material-icons">close</i>
				</div>
			  </form>		
		</li>	
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