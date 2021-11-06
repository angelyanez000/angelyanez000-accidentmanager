<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'datasim') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- CSS Files Template -->
    <link href="{{ asset('light-bootstrap-dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('light-bootstrap-dashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('light-bootstrap-dashboard/assets/css/demo.css') }}" rel="stylesheet" />

    <!--  JS Files Template   -->
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/plugins/bootstrap-switch.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/light-bootstrap-dashboard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/demo.js') }}" type="text/javascript"></script> 
  
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{  url('/light-bootstrap-dashboard/assets/img/sidebar-5.jpg')  }}" data-color="blue">
        
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{ route('home') }}" class="simple-text">
                        
                    </a>
                </div>
                <ul class="nav">
                @if( Str::contains(str_replace('"', "", Auth::user()->roles->pluck('name')), 'Admin') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                   
                    @else
                    

                    @endif
                    <!-- Menus que todos ven   -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accidents.index') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Gesti&oacute;n de Accidentes</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-background" style="background-image: url(../light-bootstrap-dashboard/assets/img/sidebar-5.jpg) "></div>

        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('home') }}" style="display:none"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" style="display:none" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto" style="display:none">


                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">{{ Auth::user() -> name.' '. Auth::user() -> last_name }} - Rol: {{ str_replace('"', "", Auth::user()->roles->pluck('name')) }}</span>
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <span class="no-icon">Salir</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu" style="display:none;">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            
                            
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

</body>
    

</html>