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
                        <div class="col-lg-8 post_container">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 ps-3 pt-3 pe-3 pb-1 mb-3 mt-5">
                                <h5 style="font-weight:bold !important;">Home</h5>
                            </div>

                                @forelse($posts as $post)
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $post->user->name }}  <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span></h4>
                                        <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                        data-bs-target="#dropdown-menu"aria-expanded="false" aria-controls="collapseExample">
                                            <i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 show rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                            <div class="card-body p-0 d-flex saveParent" style="cursor: pointer;">
                                            @if (auth()->user()->bookmark()->where('post_id', $post->id)->exists())
                                                <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $post->id }}">bookmark_remove</span>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave" id="unsave-{{ $post->id }}" data-post-id="{{ $post->id }}">Unsave Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500" id="remove-{{ $post->id }}">Remove this from your saved items</span></h4>
                                            
                                            @else
                                                <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $post->id }}">bookmark_add</span>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 save" data-post-id="{{ $post->id }}" id="save-{{ $post->id }}">Save Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500" id="add-{{ $post->id }}">Add this to your saved items</span></h4>
                                            @endif
                                            </div>
                                            <div class="card-body p-0 d-flex mt-2">
                                                <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Never see this post again</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 me-lg-5">
                                        <div id="post{{ $post->id }}" class="post-content">
                                            @if (strlen($post->content) > 500)
                                                <p class="truncated-content">
                                                    {{ \Illuminate\Support\Str::limit($post->content, 500, $end='...') }}
                                                    <a href="" class="fw-600 text-primary ms-2 see-more" id="see-more" data-post-id="{{ $post->id }}">See more</a>
                                                </p>
                                                <p class="full-content" style="display: none;">
                                                    {{ $post->content }}
                                                    <a href="" class="fw-600 text-primary ms-2 see-less" id="see-less" data-post-id="{{ $post->id }}">See less</a>
                                                </p>
                                            @else
                                                <p>{{ $post->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                
                                        <div class="card-body d-block p-0">
                                            <div class="row ps-2 pe-2">
                                            @foreach($medias as $media)
                                                @if($post->id === $media->post_id)
                                                @php
                                                    $mediaPath = public_path($media->media);
                                                    $imageInfo = @getimagesize($mediaPath);
                                                    $isImage = $imageInfo !== false;
                                                @endphp
                                                    @if($isImage)
                                                        <div class="card-body d-block p-0 mb-3">
                                                            <div class="row ps-2 pe-2">
                                                                <div class="col-sm-12 p-1"><a href="{{ asset('/' . $media->media) }}" data-lightbox="roadtr"><img src="{{ asset('/' . $media->media) }} " class="rounded-3 w-100" alt="image"></a></div>                                        
                                                            </div>
                                                        </div>
                                                    @else
                                                    <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                                        <a href="default-video.html" class="video-btn">
                                                            <video autoplay loop class="float-right w-100">
                                                                <source src="{{ asset('/' . $media->media) }}" type="video/mp4">
                                                            </video>
                                                        </a>
                                                    </div>
                                                    @endif

                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                        
                                    <div class="card-body d-flex p-0 mt-3" id="likes">
                                        <div class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss likeParent">
                                        @if (auth()->user()->likes()->where('post_id', $post->id)->exists())
                                            <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xs unlike" data-post-id="{{ $post->id }}"></i>
                                        @else
                                            <i class="feather-heart text-red me-2 btn-round-xs font-xs like" data-post-id="{{ $post->id }}"></i>
                                        @endif
                                        </div>
                                        <div class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <a id="count-{{ $post->id }}">{{ $post->postlikes()->count() }}</a>
                                        </div>
                                        
                                        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Comment</span></a>
                                        
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu21">
                                            <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"></i></h4>
                                            <div class="card-body p-0 d-flex">
                                                <ul class="d-flex align-items-center justify-content-between mt-2">
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                                                    <li><a href="#" class="btn-round-lg bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body p-0 d-flex">
                                                <ul class="d-flex align-items-center justify-content-between mt-2">
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-tumblr"><i class="font-xs ti-tumblr text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i class="font-xs ti-youtube text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-flicker"><i class="font-xs ti-flickr text-white"></i></a></li>
                                                    <li class="me-1"><a href="#" class="btn-round-lg bg-black"><i class="font-xs ti-vimeo-alt text-white"></i></a></li>
                                                    <li><a href="#" class="btn-round-lg bg-whatsup"><i class="font-xs feather-phone text-white"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">Copy Link</h4>
                                            <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"></i>
                                            <input type="text" value="https://socia.be/1rGxjoJKVF0" class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse

                        </div>               
                        <div class="col-lg-4 ps-lg-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-5">
                                <div class="card-body d-flex align-items-center p-4">
                                <span class="material-symbols-outlined">visibility</span>
                                    <h4 class="fw-700 mb-0 font-xs text-grey-900">&nbsp;Recently Viewed</h4>
                                    <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                    <figure class="avatar me-3"><img src="images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Anthony Daugloi <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span></h4>
                                </div>
                                <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                    <a href="#" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Confirm</a>
                                    <a href="#" class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">Delete</a>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-0">
                                    <figure class="avatar me-3"><img src="images/user-12.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Mohannad Zitoun <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span></h4>
                                </div>
                                <div class="card-body d-flex align-items-center pt-0 ps-4 pe-4 pb-4">
                                    <a href="#" class="p-2 lh-20 w100 bg-primary-gradiant me-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Confirm</a>
                                    <a href="#" class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">Delete</a>
                                </div>
                            </div>

                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                <span class="material-symbols-outlined">bookmark</span>
                                    <h4 class="fw-700 mb-0 font-xs text-grey-900">&nbsp;Saved</h4>
                                    <a href="default-member.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                @forelse($saves->take(2) as $saved)
                                <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                    <figure class="avatar me-3"><img src="images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ \Illuminate\Support\Str::limit($saved->post->content, 50, $end='...') }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Posted by: {{ $saved->post->user->name }}</span></h4>
                                </div>
                                @empty
                                <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                    <p>Nothing in Saved</p>
                                </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>            
        </div>
        <!-- main content -->

<script>
    var like= "{{ route('like') }}";
    var unlike= "{{ route('unlike') }}";
    var save= "{{ route('save') }}";
    var unsave= "{{ route('unsave') }}";
    var user_id = "{{ auth()->user()->id }}";
</script>
@endsection