<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body data-sidebar="dark">
    <div id="app">

        @yield('content')

    </div>

    @include('guest.general_layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('guest.general_layouts.script')

</body>
</html>
