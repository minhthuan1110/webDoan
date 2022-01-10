<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        VieTour - @stack('title')
    </title>
    @routes
    @include('backend.include.style')
    @yield('style')
</head>

<body class="sidebar-mini control-sidebar-slide-open layout-fixed" style="height: auto;">
    <div class="wrapper">
        <!-- sidebar -->
        @include('backend.include.sidebar')

        <!-- navbar -->
        @include('backend.include.navbar')

        <!-- container -->
        <div class="content-wrapper " style="min-height: 348px;">
            @yield('header')
            @yield('content')
        </div>

        @include('sweetalert::alert')
    </div>
    @include('backend.include.script')
    @yield('script')
</body>

</html>
