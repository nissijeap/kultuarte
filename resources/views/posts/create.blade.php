<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KultuArte: Culture and Visual Arts</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Favicons -->
        <link href="{{url('guest/assets/img/logo.png')}}" rel="icon">
        <link href="{{url('guest/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('melody/vendors/iconfonts/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.addons.css') }}">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('melody/css/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('melody/images/favicon.png') }}" />

        <!-- Dropzone -->
        <script src="{{ asset('assets/js/dropzone.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}" type="text/css"></link>    
    

        <!-- Sweetalert -->
        <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" type="text/css"></link>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

        
    </head>

    <body class="sidebar-icon-only sidebar-dark">
        <div class="container-scroller">
            <!-- Include navbar and sidebar -->
            @include('superadmin.layouts.navbar')
            <div class="container-fluid page-body-wrapper">
                <!-- Include settings and sidebar -->
                @include('superadmin.layouts.settings')
                @include('superadmin.layouts.sidebar')
                <!-- main panel -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">Create Post</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Create New Post</h4>
                                        <p class="card-description">Enter details to create a new post.</p>
                                        <div class="card-body p-0 mt-3 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                                        <textarea name="content" id="content" class="form-control" rows="10" placeholder="What's on your mind?" required></textarea><br>
                                        <form class="dropzone" id="dropzone" action="{{ route('store') }}"
                                            method="post" enctype="multipart/form-data" style="display: block; min-width: 100% !important; margin-left: 0% !important; border-radius: 0px">
                                            @csrf
                                        </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" id="shareButton" onclick="storePost()" class="btn btn-primary mr-2">Submit</button>
                                                <a href="{{ route('posts.index') }}" class="btn btn-light">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    @include('superadmin.layouts.footer')
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/js/post.js') }}"></script>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('melody/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('melody/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="{{ asset('melody/js/off-canvas.js') }}"></script>
        <script src="{{ asset('melody/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('melody/js/misc.js') }}"></script>
        <script src="{{ asset('melody/js/settings.js') }}"></script>
        <script src="{{ asset('melody/js/todolist.js') }}"></script>
        <!-- endinject -->
        
        <script>
            var store = "{{ route('store') }}";
        </script>

        
    </body>

</html>


