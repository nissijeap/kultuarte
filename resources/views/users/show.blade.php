<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Details</title>
    
    <link rel="shortcut icon" href="<?php echo url('mazer')?>/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app-dark.css">

    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/feather.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url('sociala')?>/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/style.css">
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/lightbox.css">
</head>

<body>
    <script src="<?php echo url('mazer')?>/dist/assets/static/js/initTheme.js"></script>
    <div id="app">

    @include('superadmin.sidebar')

    <div id="main" class='layout-navbar navbar-fixed'>

    @include('superadmin.header')

    <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3></h3>
                            <p class="text-subtitle text-muted"></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">

                            <div class="row">
                                    <div class="col-lg-12">
                                    <div class="card w-100 border-0 p-0 shadow-xss rounded-xxl">
                                        <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3" style="border-radius: 20px;  max-height: 300px;">
                                            @if ($user->thumbnail)
                                            <img src="{{ asset('images/thumbnails/' . $user->thumbnail) }}" alt="Thumbnail"class="w-100 h-100 object-cover" style="border-radius: 20px;">
                                            @else
                                            <img src="<?php echo url('sociala')?>/images/u-bg.jpg" alt="Thumbnail" class="w-100 h-100 object-cover" style="border-radius: 20px;">
                                            @endif
                                        </div>
                                        <div class="card-body p-0 position-relative">
                                            <figure class="avatar position-absolute w-100 z-index-1" style="top: -90px; left: 70px; max-width: 150px;">
                                                @if ($user->photo)
                                                <img src="{{ asset('images/profile_photos/' . $user->photo) }}" alt="Profile Photo" class="float-right p-1 bg-white rounded-circle w-100" style="max-width: 100%; height: auto;">
                                                @else
                                                <img src="<?php echo url('sociala')?>/images/null-object.jpg" alt="Profile Photo" class="float-right p-1 bg-white rounded-circle w-100" style="max-width: 100%; height: auto;">
                                                @endif
                                            </figure>
                                            <div class="d-flex flex-column align-items-start justify-content-center" style="margin-left: 100px;">
                                                <h4 class="fw-800 font-sm mt-2 mb-lg-5 mb-4 pl-15">{{ $user->fname }} {{ $user->lname }}</h4>
                                                <div class="d-flex align-items-center justify-content-center position-absolute-md right-15 top-0 me-2">
                                                    <!-- <a href="#" class="d-none d-lg-block bg-success p-3 z-index-1 rounded-3 text-white font-xsssss text-uppercase fw-700 ls-3">Add Friend</a> -->
                                                    <a href="#" class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"><i class="feather-mail font-md"></i></a>
                                                    <a href="#" id="dropdownMenu4" class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more font-md tetx-dark"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                                            <div class="card-body d-block p-4">
                                                <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                                                <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">{{ $user->description }}</p>
                                            </div>

                                            <div class="card-body border-top-xs d-flex">
                                                <i class="feather-user text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-0">Gender <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $user->gender }}</span></h4>
                                            </div>

                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-calendar text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-0">Birthdate <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ date('M d, Y', strtotime($user->birthdate)) }}</span></h4>
                                            </div>

                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-heart text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-0">Relationship <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $user->relationship }}</span></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Address <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $user->address }}</span></h4>
                                            </div>
                                            <div class="card-body d-flex pt-0">
                                                <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Email <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $user->email }}</h4>
                                            </div>
                                        </div>
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                            <div class="card-body d-flex align-items-center  p-4">
                                                <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                                                <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                            </div>
                                            <div class="card-body d-block pt-0 pb-2">
                                                <div class="row">
                                                    <div class="col-6 mb-2 pe-1"><a href="<?php echo url('sociala')?>/images/e-2.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-2.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                    <div class="col-6 mb-2 ps-1"><a href="<?php echo url('sociala')?>/images/e-3.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-3.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                    <div class="col-6 mb-2 pe-1"><a href="<?php echo url('sociala')?>/images/e-4.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-4.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                    <div class="col-6 mb-2 ps-1"><a href="<?php echo url('sociala')?>/images/e-5.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-5.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                    <div class="col-6 mb-2 pe-1"><a href="<?php echo url('sociala')?>/images/e-2.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-2.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                    <div class="col-6 mb-2 ps-1"><a href="<?php echo url('sociala')?>/images/e-1.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/e-1.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                                </div>
                                            </div>
                                            <div class="card-body d-block w-100 pt-0">
                                                <a href="#" class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i class="feather-external-link font-xss me-2"></i> More</a>
                                            </div>
                                        </div>
                                        
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                            <div class="card-body d-flex align-items-center  p-4">
                                                <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                                                <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                            </div>
                                            <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                                <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                            </div>

                                            <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                                <div class="bg-warning me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                            </div>

                                            <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                                <div class="bg-primary me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-xxl-9 col-lg-8">
                                        

                                        <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3 mt-3">
                                            <!-- <div class="card-body p-0">
                                                <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>
                                            </div>
                                            <div class="card-body p-0 mt-3 position-relative">
                                                <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="<?php echo url('sociala')?>/images/user-8.png" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                                <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
                                            </div>
                                            <div class="card-body d-flex p-0 mt-0">
                                                <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-danger feather-video me-2"></i><span class="d-none-xs">Live Video</span></a>
                                                <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></a>
                                                <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-warning feather-camera me-2"></i><span class="d-none-xs">Feeling/Activity</span></a>
                                                <a href="#" class="ms-auto" id="dropdownMenu8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu8">
                                                    <div class="card-body p-0 d-flex">
                                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3"> -->
                                            <div class="card-body p-0 d-flex">
                                                <figure class="avatar me-3"><img src="<?php echo url('sociala')?>/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Anthony Daugloi <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">3 hour ago</span></h4>
                                                <a href="#" class="ms-auto" id="dropdownMenu7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu7">
                                                    <div class="card-body p-0 d-flex">
                                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 me-lg-5">
                                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus <a href="#" class="fw-600 text-primary ms-2">See more</a></p>
                                            </div>
                                            <div class="card-body d-block p-0">
                                                <div class="row ps-2 pe-2">
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-10.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/t-10.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-11.jpg" data-lightbox="roadtrip"><img src="<?php echo url('sociala')?>/images/t-11.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-12.jpg" data-lightbox="roadtrip" class="position-relative d-block"><img src="<?php echo url('sociala')?>/images/t-12.jpg" class="rounded-3 w-100" alt="image"><span class="img-count font-sm text-white ls-3 fw-600"><b>+2</b></span></a></div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex p-0 mt-3">
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-3"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a>
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>22 Comment</a>
                                                <a href="#" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span class="d-none-xs">Share</span></a>
                                            </div>
                                        </div>
                                        
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                            <div class="card-body p-0 d-flex">
                                                <figure class="avatar me-3"><img src="<?php echo url('sociala')?>/images/user-8.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Anthony Daugloi <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">2 hour ago</span></h4>
                                                <a href="#" class="ms-auto" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                                    <div class="card-body p-0 d-flex">
                                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 me-lg-5">
                                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus <a href="#" class="fw-600 text-primary ms-2">See more</a></p>
                                            </div>
                                            <div class="card-body d-flex p-0">
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-3"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a>
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>22 Comment</a>
                                                <a href="#" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span class="d-none-xs">Share</span></a>
                                            </div>
                                        </div>



                                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                            <div class="card-body p-0 d-flex">
                                                <figure class="avatar me-3"><img src="<?php echo url('sociala')?>/images/user-8.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Anthony Daugloi <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">2 hour ago</span></h4>
                                                <a href="#" class="ms-auto" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu5">
                                                    <div class="card-body p-0 d-flex">
                                                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                    <div class="card-body p-0 d-flex mt-2">
                                                        <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                                        <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                                <a href="#" class="video-btn">
                                                    <video  autoplay loop class="float-right w-100">
                                                        <source src="<?php echo url('sociala')?>/images/v-2.mp4" type="video/mp4">
                                                    </video>
                                                </a>
                                            </div>
                                            <div class="card-body p-0 me-lg-5">
                                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus <a href="#" class="fw-600 text-primary ms-2">See more</a></p>
                                            </div>
                                            <div class="card-body d-flex p-0">
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-3"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a>
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>22 Comment</a>
                                                <a href="#" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span class="d-none-xs">Share</span></a>
                                            </div>
                                        </div>

                                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                            <div class="card-body p-0 d-flex">
                                                <figure class="avatar me-3"><img src="<?php echo url('sociala')?>/images/user-8.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">Anthony Daugloi <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">2 hour ago</span></h4>
                                                <a href="#" class="ms-auto"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                            </div>

                                            <div class="card-body p-0 me-lg-5">
                                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus <a href="#" class="fw-600 text-primary ms-2">See more</a></p>
                                            </div>
                                            <div class="card-body d-block p-0 mb-3">
                                                <div class="row ps-2 pe-2">
                                                    <div class="col-xs-6 col-sm-6 p-1"><a href="<?php echo url('sociala')?>/images/t-21.jpg" data-lightbox="roadtri"><img src="<?php echo url('sociala')?>/images/t-21.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                    <div class="col-xs-6 col-sm-6 p-1"><a href="<?php echo url('sociala')?>/images/t-22.jpg" data-lightbox="roadtri"><img src="<?php echo url('sociala')?>/images/t-22.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                </div>
                                                <div class="row ps-2 pe-2">
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-23.jpg" data-lightbox="roadtri"><img src="<?php echo url('sociala')?>/images/t-23.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-24.jpg" data-lightbox="roadtri"><img src="<?php echo url('sociala')?>/images/t-24.jpg" class="rounded-3 w-100" alt="image"></a></div>
                                                    <div class="col-xs-4 col-sm-4 p-1"><a href="<?php echo url('sociala')?>/images/t-25.jpg" data-lightbox="roadtri" class="position-relative d-block"><img src="<?php echo url('sociala')?>/images/t-25.jpg" class="rounded-3 w-100" alt="image"><span class="img-count font-sm text-white ls-3 fw-600"><b>+2</b></span></a></div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex p-0">
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-3"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"></i>2.8K Like</a>
                                                <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i>22 Comment</a>
                                                <a href="#" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span class="d-none-xs">Share</span></a>
                                            </div>
                                        </div>
                                    </div>                             
                                </div>
                            </div><br>
                        </div>
                    </div>
                </section>

    <!-- Basic Tables end -->

</div>

<!-- @include('superadmin.footer') -->

        </div>
    </div>
</div>


    <script src="<?php echo url('mazer')?>/dist/assets/static/js/components/dark.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/compiled/js/app.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo url('mazer')?>/dist/assets/static/js/pages/datatables.js"></script>

    

    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "retrieve": true,
                "order": [[ 0, "asc" ]],
                "paging": true, 
                "searching": true, 
                "info": true, 
                "lengthMenu": [5, 10, 25, 50], 
                "pageLength": 10, 
                "language": { 
                    "paginate": {
                        "next": '<i class="bi bi-arrow-right"></i>',
                        "previous": '<i class="bi bi-arrow-left"></i>'
                    },
                    "search": '<i class="bi bi-search"></i>',
                    "lengthMenu": '_MENU_'
                },
                "buttons": [
                    'copy', 'excel', 'pdf', 'csv'
                ]
            });
        });
    </script>

</body>

</html>