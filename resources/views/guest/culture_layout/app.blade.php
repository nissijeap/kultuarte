<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('guest.culture_layout.head')

</head>
<body class="has-animations" data-sidebar="light">
    <div id="app">

        @include('guest.culture_layout.header')

        @yield('content')

    </div>

    @include('guest.culture_layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('guest.culture_layout.script')

</body>
</html>
