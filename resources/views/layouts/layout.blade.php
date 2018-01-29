<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content=width=device-width, initial-scale=1>
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CCIC</title>

  <!-- Bootstrap Core CSS -->
  <link href={{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')  }} rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href={{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.css')  }} rel="stylesheet">

  @yield('estilos')

  <!-- Custom CSS -->
  <link href={{ URL::asset('dist/css/sb-admin-2.css') }} rel="stylesheet">

  <!-- Custom Fonts -->
  <link href={{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }} rel="stylesheet" type="text/css">

</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toogle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="/"><p class="text_primary">Coordinador </p></a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        

        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cambiar Contraseña</a>
            </i>
            <li class="divider"></li>
            <li>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
                </a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navegation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <!--/input-group -->
            </li>
            <li>
              <a href="/"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Mantenimientos<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="#">Docentes</a>
                </li>
                <li>
                  <a href="#">Alumnos</a>
                </li>
                <li>
                  <a href="#">Coordinadores</a>
                </li>
                <li>
                  <a href="/grados">Administrar Grados</a>
                </li>
                <li>
                  <a href="/asignaturas">Administrar Asignaturas</a>
                </li>
                <li>
                  <a href="#">Administrar cursos</a>
                </li>
                <li>
                  <a href="#">Registrar Matricula</a>
                </li>
                <li>
                  <a href="/fecha_ingreso">Establecer fechas de ingreso de notas</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
      @yield('content')
    </div>
    <!-- /#page-warpper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src={{ URL::asset('bower_components/jquery/dist/jquery.min.js')  }}></script>

  <!-- Bootstrap core JavaScript -->
  <script src={{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')  }}></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src={{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.js')  }}></script>

  @yield('js')
  <!-- Metis Menu Plugin JavaScript -->
  <script src={{ URL::asset('dist/js/sb-admin-2.js')  }}></script>
  @yield('jsope')

</body>
</html>
