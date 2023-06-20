<!doctype html>
<html lang="en">

<head>
    <title>
        {{ $siteTitle ?? 'Online Live Auction' }}
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet"/>
    @vite('resources/js/app.js')
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="azure" data-background-color="white">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"></a>
            <a href="{{ route('dashboard.index') }}" class="simple-text logo-normal">
                {{ $siteTitle ?? 'Auction' }}
            </a>
        </div>
        <div class="sidebar-wrapper">
            @include('components.sidebar')
        </div>
        <div class="sidebar-background"></div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        @include('components.navbar')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left"></nav>
                <div class="copyright float-right"></div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap-material-design') }}.min.js" type="text/javascript"></script>
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.js') }}" type="text/javascript"></script>
@yield('footer-js')
</body>

</html>
