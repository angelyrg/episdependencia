<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <link rel="icon" type="image/png" href="{{asset('assets/img/logo_epis.png')}}'"> --}}
  <link rel="shortcut icon" href="{{asset('assets/img/logo_epis.png')}}" type="image/x-icon">
  <title>
    Dependencia EPIS
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('assets/css/black-dashboard.css?v=1.0.0')}}'" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                  
                {{Auth::user()->rol}}
                </a>
            </div>

            @if (Auth::user()->rol == "Responsable")
              <ul class="nav">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i>
                        <p>Información general</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('responsable.asesores.index')}}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>Gestión de Asesores</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('responsable.proyectos.index')}}" >
                        <i class="tim-icons icon-components"></i>
                        <p>Gestión de Proyectos</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('responsable.ejecutores.index')}}">
                        <i class="fa fa-users"></i>
                        <p>Ejecutores</p>
                    </a>
                </li>
                <li>
                  <a href="{{route('responsable.informes')}}" >
                      <i class="tim-icons icon-single-copy-04"></i>
                      <p>Gestión de entregables</p>
                  </a>
              </li> 
              </ul>                
            @elseif (Auth::user()->rol == "Asesor")
              <ul class="nav">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i>
                        <p>Información general</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('asesor.asesorados')}}">
                        <i class="fa fa-users"></i>
                        <p>Asesorados</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('asesor.informes')}}" >
                        <i class="tim-icons icon-single-copy-04"></i>
                        <p>Gestión de entregables</p>
                    </a>
                </li>                  
              </ul>                
            @elseif (Auth::user()->rol == "Ejecutor")
              <ul class="nav">
                  <li>
                      <a href="{{route('home')}}">
                          <i class="fa fa-home"></i>
                          <p>Información general</p>
                      </a>
                  </li>
                  <li>
                      <a href="{{route('ejecutor.proyecto')}}">
                          <i class="tim-icons icon-components"></i>
                          <p>Mi proyecto</p>
                      </a>
                  </li>
                  <li>
                      <a href="{{route('ejecutor.informes.index')}}" >
                          <i class="tim-icons icon-single-copy-04"></i>
                          <p>Gestión de entregables</p>
                      </a>
                  </li>
                  
              </ul>                

            @endif


        </div>
    </div>


    <div class="main-panel">


        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:void(0)">
                      <img src="{{asset('assets/img/logo_epis.png')}}" alt="Logo EPIS" width="50px">
                      EPIS
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto">

                        <li class="search-bar input-group">
                          <a  class="nav-link">
                            <div class=" d-none d-lg-block d-xl-block"></div>
                            {{Auth::user()->name}}
                          </a>
                        </li>


                        <li class="dropdown nav-item">
                          
                          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                              <div class="photo">
                                  <img src="{{asset('assets/img/anime3.png')}}" alt="Profile Photo">
                              </div>
                              <b class="caret d-none d-lg-block d-xl-block"></b>
                              
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                                
                                <li class="nav-link"><a href="#" class="nav-item dropdown-item">Perfil</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="nav-link">
                                    <form action="{{route('logout')}}" method="post" style="display: inline">
                                        @csrf
                                        <button class="dropdown-item d-flex align-items-center" type="submit">
                                            <span>Cerrar sesión</span>
                                        </button>
                                    </form>
                                </li>
            
                            
                            </ul>
                        </li>
                        <li class="separator d-lg-none"></li>
                        </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

      
        <div class="content">

            <div class="">

                @yield('content')
                
            </div>

        </div>

      
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Escuela Profesional de Ingeniería de Sistemas
              </a>
            </li>
            
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> Programación web <i class="tim-icons icon-heart-2"></i>
          </div>
        </div>
      </footer>
    </div>
  </div>

  {{-- Opciones de colores --}}
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">MODO CLARO</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">MODO OSCURO</span>
        </li>

        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div> {{-- Fin Opciones de colores --}}


  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Chart JS -->
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/black-dashboard.min.js?v=1.0.0')}}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('assets/demo/demo.j')}}s"></script>



  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>