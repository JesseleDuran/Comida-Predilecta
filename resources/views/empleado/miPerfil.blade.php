@extends('appUser')
@section('content')

<div class="section no-pad-bot  grey lighten-3" id="index-banner">
          <div class="container">
      <br><br>
      <div class="row"></div>
      <div class="row"></div>
  
<div class="section no-pad-bot  grey lighten-3" id="index-banner">
          <div class="container">
      <br><br>

      


      <form class="col s12">
  <div class="row">
    <div class="input-field col s6">
      <input disabled value="{{$empleado->nombre}}" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">Nombre</label>
    </div>
 
    <div class="input-field col s6">
      <input disabled value="{{$empleado->cedula}}" id="identification" type="text" class="validate">
      <label class="active" for="identification">Cédula</label>
    </div>
  </div>
        
  
        <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="{{$empleado->telefono}}" id="phone" type="text" class="validate">
                        <label class="active" for="phone">Teléfono</label>
                    </div>
 
                    <div class="input-field col s6">
                        <input disabled value="{{$empleado->created_at}}" id="datelogin" type="text" class="validate">
                        <label class="active" for="datelogin">Fecha de Registro</label>
                    </div>
        </div>
          
        <div class="row">
                <div class="input-field col s12">
                    <input disabled value="{{$empleado->direccion}}" id="first_name2" type="text" class="validate">
                    <label class="active" for="first_name2">Dirección</label>
        </div>
  </div>
        </form>
      <a class="waves-effect waves-light btn teal" href="#modalclave"><i class="material-icons left">vpn_key</i>¿Desea cambiar su contraseña?</a>

  
  <div id="modalclave" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña Actual</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="newpassword" type="password" class="validate">
          <label for="newpassword">Nueva Contraseña</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <input id="newpasswordconfirm" type="password" class="validate">
          <label for="newpasswordconfirm">Confirme Nueva Contraseña</label>
        </div>
      </div>
  
  </div>
    </div>

      
      <div class="row"></div>
      <div class="row"></div>
      <div class="row"></div>
      <div class="row"></div>
      <div class="row"></div>
      <div class="row"></div>
  
          
    </div>
      
      <br><br>

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
  
  });
</script>

@endsection
