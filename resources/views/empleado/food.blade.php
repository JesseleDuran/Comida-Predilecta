@extends('appUser')
@section('content')


<ul id="nav-mobile" class="side-nav fixed  teal lighten-1">        
            <ul class="collapsible collapsible-accordion ">
                <li class="bold"><a class="collapsible-header active waves-effect waves-teal">Factura #00745762</a>
                <div class="collapsible-body gray">
                    <form name="formulario" class="hide">
                        <p>Combo:<br><input  disabled type="text" name="clave" id="clave"></p>
                        <p>Precio:<br><textarea disabled name="text" id="precio"></textarea></p>
                        <p>Cant.:<br><textarea disabled name="text" id="cantidad"></textarea></p>

                    </form>
                        <section id="cajadatos">
                            Factura #456709
                      
                        </section>
                    
                        <section id="totalfactura">Esperando pedido...</section> 
                    
                   
                </div>
                </li>
            </ul>
           
            <li class="bold"><a href="#modal1" class="waves-effect waves-teal"><i class="material-icons right">shopping_cart</i>Generar Pedido</a></li>
        </ul>  
   
  
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>¡Ya estamos casi LISTOS!</h4>
      <div class="row">
        <div class="input-field col s12">
          <input id="nombre" type="text">
          <label for="nombre">Nombre Apellido (Cliente)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="cedula" type="text">
          <label for="cedula">Cedula (Cliente)</label>
        </div>
      </div>
       <div class="input-field col s12">
           <select>
 
      <option value="1">Débito</option>
      <option value="2">Crédito</option>
      <option value="3">Efectivo</option>
    </select>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-teal btn-flat">Terminar Venta</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-teal btn-flat">Cancelar Orden</a>
    </div>
  </div>
      
  
           
      <br>
      
      <!--  Combos -->
      
      <div class="container grey lighten-4 right">
      
          <h2 class="center teal-text">Combos</h2>
      <li class="divider"></li>
              
        <br><br>
      
      
      <div class="row">
      
       @foreach ($combos as $combo)   
      	<div class="left col s12 m3">
      		<div class="card">
        		<div class="card-content">
                	<a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" onclick="return facturar({{ $combo->id }},{{ $combo->precio }},1);">
                    	<i class="material-icons">add</i>
               		 </a>
            		<h5 class="teal-text">{{ $combo->nombre }}</h5>
            		<li class="divider"></li>
            		<p>{{ $combo->descripcion }}. Precio: Bs.{{ $combo->precio }}</p>
            		<p>Comidas:</p>	
            		@foreach ($combo->comidaCombo as $comida)
					<li>({{ $comida->cantidad }}) {{ $comida->comida->nombre }} </li>
					@endforeach
            		<li class="divider"></li>
            		<p>Cant. Disponible: 009</p>
        		</div>
      		</div>
      	</div>
      @endforeach
          
      </div>
      <br><br>

    </div>
      

    <!--  Comidas -->
    
    
    <div class="container grey lighten-4 right">      
      
        <h2 class="center teal-text">Comida</h2>
        <li class="divider"></li>
      
      <div class="row">
           @foreach ($comidas as $comida)
            <div class="left col s12 m3">
            <div class="card">
                <div class="card-content">
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" onclick="return facturar({{ $comida->id }},{{ $comida->precio }},1);">
                    <i class="material-icons">add</i>
                    </a>
        
                    <h5 class="teal-text">{{ $comida->nombre }}</h5>
                    <li class="divider"></li>
                    <p>{{ $combo->descripcion }}. Precio: Bs.{{ $combo->precio }}</p>
                    <p>Ingredientes:</p>
                     @foreach ($comida->comidaIngredientes as $ingrediente)

					   <li>{{ $ingrediente->ingrediente->nombre }} ({{ $ingrediente->cantidad }})</li>
				    @endforeach
                    <li class="divider"></li>
                    <p>Cant. Disponible: 009</p>
                
                </div>
            </div>
        </div>

         @endforeach
          
          
      
    
    <!--  Extras -->
    
    
    <div class="container grey lighten-4 right">      
      
        <h2 class="center teal-text">Extras</h2>
        <li class="divider"></li>
      
      <div class="row">
           
            <div class="float left col s12 m4">
      <div class="card">
        
          
       
        <div class="card-content">
            
          <h5 class="lime-text">Extras</h5>
            
            <div class="collection" onclick="return facturar(A,600,1);">
                  
                   <a  class="collection-item left">Ex#1<a class="btn-floating btn-small  waves-effect waves-light teal right" onclick="return facturar(11,900,1);"><i class="material-icons">add</i></a>
                   <a  class="collection-item left">Ex#2<a class="btn-floating btn-small  waves-effect waves-light teal right" onclick="return facturar(12,1000,1);"><i class="material-icons">add</i></a>
                   <a  class="collection-item left">Ex#3<a class="btn-floating btn-small  waves-effect waves-light teal right" onclick="return facturar(13,2000,1);"><i class="material-icons">add</i></a>
                   
              </div>
          <p>Cant. Disponible: 009</p>
        </div>
      </div>
    </div>
          
      </div>
    </div>


@stop


@section('scripts')

<script type="text/javascript">

  	$(document).ready(function()
  	{
    	$('.modal').modal();
    	 $('select').material_select();
    });	

    	function nuevoitem()
    	{
			var clave=document.getElementById('clave').value;
			var valor=document.getElementById('precio').value;
			var cantidad=document.getElementById('cantidad').value;
			sessionStorage.setItem(clave,valor);

    		if(sessionStorage.length>0)
    		{
        		for(var u=0; u<=sessionStorage.length;u++)
        		{
            		var preclave=sessionStorage.key(u);
            		if(clave===preclave)
            		{
                		var suma=sessionStorage.getItem('sub'+clave);
                		suma+=1;
                		sessionStorage.setItem('sub'+clave,suma);
                	}
            	}
    		}else
    		{
    			sessionStorage.setItem('sub'+clave,cantidad);
    		}

			mostrar();
		} 


		function mostrar()
		{

    		var cajadatos=document.getElementById('cajadatos');
    		var totalfactura=document.getElementById('totalfactura');
    		var subtotalcalculo=0;
    		cajadatos.innerHTML='';
    
    		for(var f=0;f<sessionStorage.length;f++)
   			{
        		var clave=sessionStorage.key(f);
        		var valor=sessionStorage.getItem(clave);
        		var cantidad=sessionStorage.getItem('sub'+clave);
        		var cifra = cantidad.length;
        		if(cantidad!==null)
        		{
            		if((clave==11)||(clave==12)||(clave==13))
            		{
           				cajadatos.innerHTML+='<p><input class="chip" type="button" value="Extra   -  Bs.'+valor+'    x ('+cifra+')" onclick="return eliminar('+clave+');"></p>';
            		}else
            		{
            			if((clave==8)||(clave==10)||(clave==9))
            			{
            
            				cajadatos.innerHTML+='<p><input class="chip" type="button" value="Bebida   -  Bs.'+valor+'    x ('+cifra+')" onclick="return eliminar('+clave+');"></p>';
            			}else
            			{
            				cajadatos.innerHTML+='<p><input class="chip" type="button" value="'+clave+'   -  Bs.'+valor+'    x ('+cifra+')" onclick="return eliminar('+clave+');"></p>';
            			}
            		}
            		totalfactura.innerHTML='<p>Subtotal                  Bs.'+ (subtotalcalculo=subtotalcalculo+(valor*cifra)) +'</p>';
        		}
        		totalfactura.innerHTML+='<p>Total (Incluye 10% IVA)  Bs.'+ (subtotalcalculo+(subtotalcalculo*0.1)) +'</p>';
    		}

    		if(sessionStorage.length===0)
    		{
            
    			totalfactura.innerHTML='<p>Subtotal                  Bs. 0 </p>';
    			totalfactura.innerHTML+='<p>Total (Incluye 10% IVA)  Bs. 0 </p>';
			}    
        }
			
		function facturar(meal, price, qnt) 
		{
			var Combo=meal;
			var Bs=price;
			var x=qnt;
			document.getElementById('clave').value=Combo;
			document.getElementById('precio').value=Bs;
			document.getElementById('cantidad').value=x;
			nuevoitem();
		}

		function eliminar(clave)
		{
        
    		var actual=sessionStorage.getItem('sub'+clave);

    		if(actual.length>1)
    		{ 
        		sessionStorage.setItem('sub'+clave,0);
        		var resta=sessionStorage.getItem('sub'+clave);

        		for(var w=0;w<(actual.length-2);w++)
        		{
            		resta+=1;
        		}
    
    			sessionStorage.setItem('sub'+clave,resta);    
    		}else
    		{
        		sessionStorage.removeItem(clave);
        		sessionStorage.removeItem('sub'+clave);
    		}
    
    		mostrar();
		}
  
	
</script>

@endsection