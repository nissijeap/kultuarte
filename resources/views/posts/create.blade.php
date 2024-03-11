@if(auth()->user()->hasRole('SuperAdmin'))
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>KultuArte: Culture and Visual Arts</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <!-- Add this in your HTML head section -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

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
                                            <form id="dropzoneForm" class="dropzone" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
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
        <!-- Custom js for this page-->
        <script src="{{ asset('melody/js/file-upload.js') }}"></script>
        <script src="{{ asset('melody/js/typeahead.js') }}"></script>
        <script src="{{ asset('melody/js/select2.js') }}"></script>
        <!-- End custom js for this page-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

        <script>
            var store = "{{ route('posts.store') }}";
        </script>

        <script>
            Dropzone.autoDiscover = false;
            $(document).ready(function () {
                $("#dropzoneForm").dropzone({
                    url: "{{ route('posts.store') }}",
                    paramName: "file",
                    maxFilesize: 2,
                    acceptedFiles: 'image/*, video/*',
                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove',
                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        console.log(response);
                    }
                });
            });

            function storePost() {
                // You may add your own logic for storing posts here if needed
                // For now, this function just submits the form
                document.getElementById("dropzoneForm").submit();
            }
        </script>
    </body>

</html>
@else


@extends('layouts.app')
    @section('content')
        <div class="preloader"></div>

        
        <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

            <!-- main content -->
            <div class="main-content">
                
                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        @include('layouts.preloader')
                        <div class="row feed-body">
                            <div class="col-lg-8 mb-4">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 ps-3 pt-3 pe-3 pb-1 mb-3 mt-5">
                                    <h3 style="font-weight:bold !important;">Share your hidden gem</h3>
                                </div>

                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                    <div class="card-body p-0">
                                        <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight" style="color: #e15600 !important;"></i>Create Post</a>
                                    </div>
                                    <div class="card-body p-0 mt-3 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                                        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{ asset('assets/images/profile-4.png') }}" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                        <textarea name="content" id="content" class="h150 bor-0 w-100 rounded-xxl p-2 ps-5 font-xss fw-500 border-light-md theme-dark-bg postarea" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
                                        <span class="material-symbols-outlined exit" onclick="photoDown()" id="exit">cancel</span>
                                        <form class="dropzone mt-4" id="dropzone" action="{{ route('store') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="card-body d-flex p-0 mt-0">
                                        <p onclick="photoUp()" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 cursor-pointer"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></p>
                                        <button id="shareButton" onclick="storePost()" type="button" class="ms-auto p-2 lh-20 w100 me-2 text-center font-xss fw-600 ls-1 rounded-xl" style="border:none;" disabled>SHARE</button>
                                    </div>
                                </div>


                            </div> 
                            
                            <div class="col-lg-4 ps-lg-0">
                                @include('posts.viewedList')
                                @include('posts.savedList')
                            </div>
                        </div>
                    </div>
                    
                </div>            
            </div>
            <!-- main content -->

            <!-- right chat -->
            <div class="right-chat nav-wrap mt-2 right-scroll-bar">
                <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->

                </div>
            </div>

    <script>
        var store= "{{ route('store') }}";
    </script>
    @endsection

@endif

