<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from www.urbanui.com/melody/template/pages/ui-features/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:06:07 GMT -->
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
    <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo url('melody')?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo url('melody')?>/images/favicon.png" />
    </head>

    <body class="sidebar-icon-only sidebar-dark">
    <div class="container-scroller">
        @include('superadmin.layouts.navbar')
        <div class="container-fluid page-body-wrapper">
        @include('superadmin.layouts.settings')
        @include('superadmin.layouts.sidebar')
    
        <!-- partial -->
        <div class="main-panel">          
            <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                Culture Details
                </h3>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Culture</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
                </nav>
            </div>
            <div class="row">
            <div class="col-12 grid-margin stretch-card d-none d-md-flex">
                <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">{{ $blog->title }}</h3>
                    <p class="card-description"><code>{{ $blog->user->name }}</code> | {{ $blog->created_at->format('M d, Y') }}</p>
                    <div class="row">
                        <div class="col-2">
                        <ul class="nav nav-tabs nav-tabs-vertical-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="culture-tab-custom" data-toggle="tab" href="#culture-3" role="tab" aria-controls="culture-3" aria-selected="true">
                                    <i class="fas fa-globe col-3"></i> Culture
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="people-tab-custom" data-toggle="tab" href="#people-3" role="tab" aria-controls="people-3" aria-selected="false">
                                    <i class="fas fa-users col-3"></i> People
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="language-tab-custom" data-toggle="tab" href="#language-3" role="tab" aria-controls="language-3" aria-selected="false">
                                    <i class="fas fa-language col-3"></i> Language
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="food-tab-custom" data-toggle="tab" href="#food-3" role="tab" aria-controls="food-3" aria-selected="false">
                                    <i class="fas fa-utensils col-3"></i> Food & Drink
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="music-tab-custom" data-toggle="tab" href="#music-3" role="tab" aria-controls="music-3" aria-selected="false">
                                    <i class="fas fa-music col-3"></i> Music & Dances
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="arts-tab-custom" data-toggle="tab" href="#arts-3" role="tab" aria-controls="arts-3" aria-selected="false">
                                    <i class="fas fa-paint-brush col-3"></i> Arts & Crafts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="location-tab-custom" data-toggle="tab" href="#location-3" role="tab" aria-controls="location-3" aria-selected="false">
                                    <i class="fas fa-map-marker-alt col-3"></i> Location
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="religion-tab-custom" data-toggle="tab" href="#religion-3" role="tab" aria-controls="religion-3" aria-selected="false">
                                    <i class="fas fa-church col-3"></i> Religion
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="politics-tab-custom" data-toggle="tab" href="#politics-3" role="tab" aria-controls="politics-3" aria-selected="false">
                                    <i class="fas fa-balance-scale col-3"></i> Politics
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="events-tab-custom" data-toggle="tab" href="#events-3" role="tab" aria-controls="events-3" aria-selected="false">
                                    <i class="fas fa-calendar-alt col-3"></i> Events
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="history-tab-custom" data-toggle="tab" href="#history-3" role="tab" aria-controls="history-3" aria-selected="false">
                                    <i class="fas fa-history col-3"></i> History
                                </a>
                            </li>
                        </ul>

                        </div>
                        <div class="col-10 col-lg-10">
                        <div class="tab-content tab-content-vertical tab-content-vertical-custom">

                            <div class="tab-pane fade show active" id="culture-3" role="tabpanel" aria-labelledby="culture-tab-custom">
                            <hr><h4 style="text-align: center;">CULTURE</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->culture !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="people-3" role="tabpanel" aria-labelledby="people-tab-custom">
                            <hr><h4 style="text-align: center;">PEOPLE</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->people !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="language-3" role="tabpanel" aria-labelledby="language-tab-custom">
                            <hr><h4 style="text-align: center;">LANGUAGE</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->language !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="food-3" role="tabpanel" aria-labelledby="food-tab-custom">
                            <hr><h4 style="text-align: center;">FOOD AND DRINK</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->food_drink !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="music-3" role="tabpanel" aria-labelledby="music-tab-custom">
                            <hr><h4 style="text-align: center;">MUSIC AND DANCES</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->music !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="arts-3" role="tabpanel" aria-labelledby="arts-tab-custom">
                            <hr><h4 style="text-align: center;">ARTS AND CRAFTS</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->arts !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="location-3" role="tabpanel" aria-labelledby="location-tab-custom">
                            <hr><h4 style="text-align: center;">LOCATION</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->location !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="religion-3" role="tabpanel" aria-labelledby="religion-tab-custom">
                            <hr><h4 style="text-align: center;">RELIGION</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->religion !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="politics-3" role="tabpanel" aria-labelledby="politics-tab-custom">
                            <hr><h4 style="text-align: center;">POLITICAL SYSTEM</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->politics !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="events-3" role="tabpanel" aria-labelledby="events-tab-custom">
                            <hr><h4 style="text-align: center;">EVENTS</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->events !!}
                            </p>
                            </div>

                            <div class="tab-pane fade" id="history-3" role="tabpanel" aria-labelledby="history-tab-custom">
                            <hr><h4 style="text-align: center;">HISTORY</h4><hr><br>
                            <p class="mt-4">
                                {!! $blog->history !!}
                            </p>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
            <!-- content-wrapper ends -->
            @include('superadmin.layouts.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo url('melody')?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo url('melody')?>/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo url('melody')?>/js/off-canvas.js"></script>
    <script src="<?php echo url('melody')?>/js/hoverable-collapse.js"></script>
    <script src="<?php echo url('melody')?>/js/misc.js"></script>
    <script src="<?php echo url('melody')?>/js/settings.js"></script>
    <script src="<?php echo url('melody')?>/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo url('melody')?>/js/tabs.js"></script>
    <!-- End custom js for this page-->
    </body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/ui-features/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:06:22 GMT -->
</html>

