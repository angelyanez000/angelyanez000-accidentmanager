<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sistema de reporte de Accidentes Personales') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- CSS Files Template -->
    <link href="{{ asset('light-bootstrap-dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('light-bootstrap-dashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('css/applogin.css') }}" rel="stylesheet" />

    <!--  JS Files Template   -->
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap-dashboard/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            

        </div>
    </div>
</nav>


    <div id="app">
        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>