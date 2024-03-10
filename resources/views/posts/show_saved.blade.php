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
                                <h5 style="font-weight:bold !important;">Saved Posts</h5>
                            </div>

                                @forelse($saves as $save)
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $save->post->user->name }}  <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $save->post->created_at->diffForHumans() }}</span></h4>
                                        <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                        data-bs-target="#dropdown-menu"aria-expanded="false" aria-controls="collapseExample">
                                        <i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        
                                        <div class="card-body p-0 d-flex saveParent" style="cursor: pointer;">
                                            @if (auth()->user()->bookmark()->where('post_id', $save->post->id)->exists())
                                                <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $save->post->id }}">bookmark_remove</span>
                                                <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $save->post->id }}" data-post-id="{{ $save->post->id }}">Unsave Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $save->post->id }}">Remove this from your saved items</span></div>
                                            
                                            @else
                                                <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $save->post->id }}">bookmark_add</span>
                                                <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 save text-{{ $save->post->id }}" data-post-id="{{ $save->post->id }}">Save Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $save->post->id }}">Add this to your saved items</span></div>
                                            @endif
                                        </div>
                                        <div class="card-body p-0 d-flex mt-2">
                                            <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500">Never see this post again</span></h4>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-body p-0 me-lg-5">
                                        <div id="post{{ $save->post->id }}" class="post-content">
                                            @if (strlen($save->post->content) > 500)
                                                <p class="truncated-content">
                                                    {{ \Illuminate\Support\Str::limit($save->post->content, 500, $end='...') }}
                                                    @if (auth()->user()->viewed_post()->where('post_id', $save->post->id)->exists())
                                                    <a href="" class="fw-600 text-primary ms-2 see-more" id="see-more" data-post-id="{{ $save->post->id }}">See more</a>
                                                    @else
                                                    <a href="" class="fw-600 text-primary ms-2 see-more storeview" id="see-more" data-post-id="{{ $save->post->id }}">See more</a>
                                                    @endif
                                                </p>
                                                <p class="full-content" style="display: none;">
                                                    {{ $save->post->content }}
                                                    <a href="" class="fw-600 text-primary ms-2 see-less" id="see-less" data-post-id="{{ $save->post->id }}">See less</a>
                                                </p>
                                            @else
                                                <p>{{ $save->post->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                
                                        <div class="card-body d-block p-0">
                                            <div class="row ps-2 pe-2">
                                            @foreach($save->post->media as $media)
                                                @if($save->post->id === $media->post_id)
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
                                                            <video class="float-right w-100">
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
                                        @if (auth()->user()->likes()->where('post_id', $save->post->id)->exists())
                                            <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xs unlike" data-post-id="{{ $save->post->id }}"></i>
                                        @else
                                            <i class="feather-heart text-red me-2 btn-round-xs font-xs like" data-post-id="{{ $save->post->id }}"></i>
                                        @endif
                                        </div>
                                        <div class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <a id="count-{{ $save->post->id }}">{{ $save->post->postlikes()->count() }}</a>
                                        </div>
                                        
                                        <div class="d-flex align-items-center fw-600 text-grey-900 text-dark me-1 lh-26 font-xssss"><i class="feather-eye text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss" id="views-{{ $save->post->id }}">{{ $save->post->views }}</span></div>

                                        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Comment</span></a>

                                        

                                        
                                        
                                        
                                    </div>
                                </div>
                                @empty
                                @endforelse

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
<script>
    var like= "{{ route('like') }}";
    var unlike= "{{ route('unlike') }}";
    var save= "{{ route('save') }}";
    var update= "{{ route('update') }}";
    var unsave= "{{ route('unsave') }}";
    var destroyImg= "{{ route('destroyImg') }}";
    var viewed= "{{ route('viewed') }}";
    var user_id = "{{ auth()->user()->id }}";
</script>
@endsection