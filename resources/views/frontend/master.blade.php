<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        VieTour - @stack('title')
    </title>

    <!-- Cac link css dat o day -->
    @include('frontend.include.style')

    <!-- Push style theo tung view khac nhau -->
    @yield('style')

</head>

<body>

    {{-- @include('frontend.include.load-wrap') --}}

    <div class="main">
        @include('frontend.include.header')

        <div class="container">

            @yield('content')

        </div>

        @include('frontend.include.footer')
    </div>

    @include('frontend.include.form-login')

    <!-- back to top -->
    <a id="button-back-top"></a>

    @include('sweetalert::alert')

</body>

@include('frontend.include.script')
@yield('script')

</html>
