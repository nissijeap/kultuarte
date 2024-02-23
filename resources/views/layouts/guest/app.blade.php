<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.guest.head')

</head>
<body>
    <div id="app">

        @include('layouts.guest.header')

        @yield('content')

    </div>

    @include('layouts.guest.footer')

    @include('layouts.guest.script')

</body>
</html>
