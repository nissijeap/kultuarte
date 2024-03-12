
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