<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KultuArte</title>

    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url('sociala')?>/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/style.css"> 

</head>

<body>

    @include('layouts.auth_header')

    @yield('content')

    @include('layouts.auth_modal')

    <script src="<?php echo url('sociala')?>/js/plugin.js"></script>
    <script src="<?php echo url('sociala')?>/js/scripts.js"></script>

    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')

</body>
</html>