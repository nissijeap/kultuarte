<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('guest.sublayout.head')

</head>
<body class="has-animations" data-sidebar="light">
    <div id="app">

        @include('guest.sublayout.header')

        @yield('content')

    </div>

    @include('guest.sublayout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('guest.sublayout.script')

</body>
</html>
