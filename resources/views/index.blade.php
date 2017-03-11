@extends('app')
@section('content')

@include ('partials.modals')
<!-- TABLAS -->	
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
	  <h2 style="text-align:center"> Bienvenido a la Administración </h2>
	  <h2 style="text-align:center"> Mi Comida Predilecta </h2>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Admistre su Inventario</span>
              <p>Administre Los Ingrediente, Combos y Comidas de Su Restaurante</p>
            </div>
            <div class="card-action">
              <a href="{{ url('/ingrediente') }}">Vamos!</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Admistre sus Empleados, Ventas y Clientes</span>
              <p>Administre El manejo de su Restaurante</p>
            </div>
            <div class="card-action">
              <a href="{{ url('/user') }}">Vamos!</a>
            </div>
          </div>
        </div>
	
      </div>
	  <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Consulte Sus Estadísticas</span>
              <p>Vea y Analice sus Estadisticas de Ventas</p>
            </div>
            <div class="card-action">
              <a href="{{ url('/ComidasVendidas') }}">Vamos!</a>
            </div>
          </div>
        </div>   	  
	  </div>
    </div>
  </div>
@endsection

@section('scripts')

<script>

  $(document).ready(function(){
    $('.modal').modal();
  });
</script>

@endsection

