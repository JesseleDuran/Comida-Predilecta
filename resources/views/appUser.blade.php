<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Mi Comida Predilecta (Ver 1.0)</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>
<body>
<div class="navbar-fixed"> 
  <nav class="extended-nav">
        <div class="nav-wrapper teal">
            <a href="#!" class="brand-logo center"><i class="material-icons">loyalty</i>Mi Comida Predilecta</a>
            <ul id="datos" class="dropdown-content">
              <li><a href="{{ url('/misVentas') }}"><i class="material-icons left">equalizer</i>Mis Ventas</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('/miPerfil') }}"><i class="material-icons left">settings</i>Mi Perfil</a></li>
              <li class="divider"></li>
              <li>



                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                
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

          <ul class="right hide-on-med-and-down active">
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="datos">{{$empleado->nombre}}<i class="material-icons right">perm_identity</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Ayuda</a></li>
          </ul>
          <div class="nav-content">
            <ul class="tabs tabs teal">
                <li class="tab"><a target="_self" href="{{ url('/empleado/mesas') }}" class="white-text">Mesas</a></li>
                     
            </ul>     
          </div>
        </div>   
  </nav>
</div>

     <br>
     <br>

    @yield('content')


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="/js/materialize.js"></script>

  @yield('scripts')

</body>
</html>