<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('backend/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
<link href="{{asset('backend/css/material-dashboard.css')}}" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('backend/demo/demo.css')}}" rel="stylesheet" />
  @stack('css')

</head>
<body>
    <div id="app">
        <div class="wrapper ">
            @if (Request::is('admin*'))
                @include('layouts.partial.sidebar')
            @endif
                <div class="main-panel">
                    @if (Request::is('admin*'))
                        @include('layouts.partial.topbar')
                    @endif
                        @yield('content')
                    @if (Request::is('admin*'))
                        @include('layouts.partial.footer')
                    @endif
                </div>
        </div>
    </div>
    <!--   Core JS Files   -->
<script src="{{asset('backend/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backend/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backend/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{asset('backend/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('backend/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('backend/js/material-dashboard.min.js')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('backend/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  @stack('scripts')
</body>
</html>
