
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Tabbed IFrames</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link type="text/css" href="{{ URL::asset('frontend/fontawesome-free-5/css/all.css') }}" rel="stylesheet">
  <!-- Theme style -->
  <link type="text/css" href="{{ URL::asset('frontend/backend/css/adminlte.min.css') }}" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link type="text/css" href="{{ URL::asset('frontend/backend/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
  <!-- dateplicker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
</head>
{{-- <body class="login-page" style="min-height: 496.391px;">

 --}}
 {{-- <body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">


        `<!-- header -->
        @include('admin.include.sidebar')
        <!-- sidebar -->
        @include('admin.include.navbar')

        <!-- container -->

            <div class="content-wrapper" style="min-height: 348px;">
            @yield('header')
                @yield('content')

            </div>


    </div> --}}

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>


    </body>
<!-- ./wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{{ URL::asset('frontend/jquery/jquery-ui.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{ URL::asset('frontend/backend/js/bootstrap4.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="{{ URL::asset('frontend/backend/js/overlayScrollbars.min.jss') }}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ URL::asset('frontend/backend/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ URL::asset('frontend/backend/js/demo.js') }}"></script>
<!-- datepicke -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
  $('.date').datepicker({
    multidate: true
});

$('.date').datepicker('setDates', [new Date(2014, 2, 5), new Date(2014, 3, 5)])
</script>

</body>
</html>
