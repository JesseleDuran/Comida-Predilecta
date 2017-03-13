<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Mi Comida Predilecta (Ver 1.0)</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/css/front-usuario.css" rel="stylesheet">

</head>
<body>
    
  <nav>
        <div class="nav-wrapper amber">
            <a href="#!" class="brand-logo center"><i class="material-icons">loyalty</i>Mi Comida Predilecta</a>
            <ul class="right hide-on-med-and-down">
                <li></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li></li>
            </ul>
        </div>
    </nav>   
      
  <div class="section no-pad-bot  yellow lighten-3" id="index-banner">
      <div class="container">
      <br><br>
      <h1 class="header center amber-text">Bienvenido</h1>
      

      <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
   
                <div class="panel-body">
                  
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        

                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="cedula" class="amber-text">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="cedula" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus>

                                @if ($errors->has('cedula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="amber-text">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn-large waves-effect waves-light amber">
                                    Iniciar Sesión
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <br><br>

    </div>
  </div>

  <footer class="page-footer amber">
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

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>





</div>


@include ('errors.list')
