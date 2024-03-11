
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
                            <div class="col-lg-8 mb-4 post_container">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 ps-3 pt-3 pe-3 pb-1 mb-3 mt-5">
                                    <h3 style="font-weight:bold !important;">Blogs</h3>
                                </div>
                                <div class="row">
                                    
                                    @forelse($blogs as $blog)
                                    <div class="col-lg-6">
                                        <div class="position-relative mb-3">
                                            
                                            <div class="bg-white border border-top-0">
                                                <img src="{{ asset('assets/images/e-1.jpg') }}" clas="img-fluid" style="object-fit:cover; width: 100%;">
                                                <div class="mb-2 ps-4 pt-4">
                                                    <a class="badge text-uppercase font-weight-semi-bold p-2 mr-2" href="#" style="background-color: #e15600;">{{ $blog->ethnicity->ethnic_name }}</a>
                                                    <a class="text-body"><small>{{ $blog->created_at->format('M d, Y') }}</small></a>
                                                </div>
                                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold  ps-4" href="{{ route('showBlogs', $blog->id) }}">{{ $blog->title }}</a>
                                                
                                            </div>
                                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded-circle mr-2" src="{{ asset('assets/images/icon-1.png') }}" width="25" height="25">
                                                    <snall>{{ $blog->user->name }}</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <small class="ml-3">
                                                        <i class="feather-heart mr-2"></i>12345
                                                    </small>
                                                    <small class="ml-3">
                                                        <i class="feather-eye mr-2"></i>123
                                                    </small>
                                                    <small class="ml-3">
                                                        <i class="feather-message-circle mr-2"></i>123
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($loop->iteration % 2 == 0)
                                        </div>
                                        <div class="row">
                                    @endif
                                    @empty
                                    @endforelse
                                    
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

    @endsection