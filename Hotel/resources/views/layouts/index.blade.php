<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel sistema </title>
    <link href="/hotel/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hotel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/hotel/vendor/nprogress/nprogress.css" rel="stylesheet">
    <link href="/hotel/public/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/home') }}" class="site_title"><i class="fa fa-moon-o"></i> <span>Sueño de Luna</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <!-- /menu profile quick info -->
            <br />    
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-table"></i> Reservas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/reservation/create') }}">Nueva</a></li>
                      <li><a href="{{action('ReservationController@index')}}">Del dia</a></li>
                      <li><a href="{{url('search')}}">Buscar</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/showClient')}}">Nuevo</a></li>
                      <li><a href="{{action('PersonController@index')}}">Buscar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i>Suministros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('input') }}">Entrada</a></li>
                      <li><a href="{{ url('output') }}">Salida</a></li>
                      <li><a href="{{action('ProvisionController@create')}}">Inventario actual</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bed"></i>Habitaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('roomClean') }}">Limpieza</a></li>
                      <li><a href="{{ url('roommaintenance') }}">Mantenimiento</a></li>
                      <li><a href="{{url('HistoryRoom')}}">Historial</a></li>
                      <li><a href="{{action('ProvisionController@create')}}"></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-exchange"></i> Ingresos/Gastos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('indexIncome') }}">Registro ingresos</a></li>
                      <li><a href="{{ url('indexReport') }}">Registro gastos</a></li>
                      <li><a href="{{ url('searchInExp') }}">Buscar</a></li>
                    </ul>
                  </li>
                @if ( Auth::user()->roll== 1)
                  <li><a><i class="fa fa-bar-chart-o"></i>Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('reportReservation') }}">Reservas</a></li>
                      <li><a href="{{ url('ReportClient') }}">Clientes</a></li>
                      <li><a href="{{ url('ReportRoom') }}">Habitaciones</a></li>
                      <li><a href="{{ url('ReporCleaning') }}">Limpieza</a></li>
                      <li><a href="{{ url('ReporMaintenance') }}">Mantenimiento</a></li>
                      <li><a href="{{ url('ReporProvision') }}">Suministros</a></li>
                      <li><a href="{{ url('ReporIncomeExp') }}">Ingresos/Gastos</a></li>
                    </ul>
                  </li>
                     <li><a><i class="fa fa-cog"></i>Configuración<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a  href="{{ url('/configuration/show') }}">Registro usuario</a></li>
                      <li><a  href="{{ url('regist_provi') }}">Registro Suministros</a></li>
                      <li><a href="{{ url('/showUser') }}"S>Usuarios Registrados</a></li>
                       <li><a  href="{{action('PriceRoomController@index')}}">Actualizar Precio</a></li>

                    </ul>
                  </li>   
                     @endif
                   
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     {{ Auth::user()->user }} <span class="caret"></span>
                       </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('changePassword') }}"> Cambiar contraseña</a></li>
                    <li> <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir </a></li>
                  </ul>
                </li>
                
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">2</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                       @foreach($result as $post)
                        <li>
                      <a href="{{url('/editOnline', [$post->id_person, $post->id])}}" >
                        <span>
                          <span>Reserva {{$post->reservation_num}}</span>
                          <span class="time">Hora {{$post->hora}} </span>  
                        </span>
                        <span class="message">
                          Pendiente de confirmar
                        </span>
                      </a>
                    </li> @endforeach   
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver mas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                     </form>
                </li>
                 
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
         
            @yield('content')


          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
           <footer background-color:red>
          <div    class="pull-right">
            ©Todos los derehos reservados  <a href="http://hotelsuenodeluna.com">C&H Solutions</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/hotel/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/hotel/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/hotel/vendor/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/hotel/vendor/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/hotel/vendor/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="/hotel/vendor/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    
    <script src="/hotel/vendor/Flot/jquery.flot.js"></script>
    <script src="/hotel/vendor/Flot/jquery.flot.pie.js"></script>
    <script src="/hotel/vendor/Flot/jquery.flot.time.js"></script>
    <script src="/hotel/vendor/Flot/jquery.flot.stack.js"></script>
    <script src="/hotel/vendor/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/hotel/vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/hotel/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/hotel/vendor/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/hotel/vendor/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/hotel/vendor/moment/min/moment.min.js"></script>
    <script src="/hotel/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/hotel/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/hotel/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/hotel/public/build/js/custom.min.js"></script>
  </body>
</html>