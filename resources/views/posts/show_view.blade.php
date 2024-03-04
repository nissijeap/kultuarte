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
                                <h5 style="font-weight:bold !important;">Recently Viewed</h5>
                            </div>

                                @forelse($views as $view)
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $view->post->user->name }}  <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $view->post->created_at->diffForHumans() }}</span></h4>
                                        <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                        data-bs-target="#dropdown-menu"aria-expanded="false" aria-controls="collapseExample">
                                            <i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                        @if ($view->post->user_id === auth()->user()->id)
                                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        
                                                <div class="card-body p-0 d-flex mt-2">
                                                    <button type="button" class="card-body p-0 d-flex" data-post-id="{{ $view->post->id }}" style="border: none;background: none;color: inherit;text-decoration: none; text-align: left;" data-bs-toggle="modal" data-bs-target="#postModal{{ $view->post->id }}"><span class="material-symbols-outlined text-black-500 me-3 font-lg">edit</span><h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $view->post->id }}" data-post-id="{{ $view->post->id }}">Edit Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $view->post->id }}">Modify this post</span></h4></button>
                                                   
                                                    
                                                </div>
                                                <div class="card-body p-0 d-flex" style="cursor: pointer;">
                                                    <form id="deleteForm{{ $view->post->id }}" action="{{ route('destroy', $view->post->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="card-body p-0 d-flex" data-post-id="{{ $view->post->id }}" style="border: none;background: none;color: inherit;text-decoration: none; text-align: left;"><span class="material-symbols-outlined text-black-500 me-3 font-lg">delete</span><h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $view->post->id }}" data-post-id="{{ $view->post->id }}">Delete Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $view->post->id }}">Remove this from your timeline</span></h4></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal fade bs-example-modal-center" id="postModal{{ $view->post->id }}" data-post-id="{{ $view->post->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Post {{ $view->post->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="w-100 rounded-xxl border-0 mb-0">
                                                                    <div class="card-body p-0 mt-1 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                                                                        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{ asset('assets/images/profile-4.png') }}" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                                                        <input type="hidden" id="post_id-{{ $view->post->id }}" name="post_id" value="{{ $view->post->id }}">
                                                                        <textarea name="content" id="content-{{ $view->post->id }}" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xss fw-500 border-light-md theme-dark-bg postarea" cols="30" rows="10">{{ $view->post->content }}
                                                                        </textarea>
                                                                        @foreach($view->post->media as $media)
                                                                                @php
                                                                                    $mediaPath = public_path($media->media);
                                                                                    $imageInfo = @getimagesize($mediaPath);
                                                                                    $isImage = $imageInfo !== false;
                                                                                @endphp

                                                                                @if($isImage)
                                                                                <div class="col-md-4 mb-3 image-container">
                                                                                    <div class="card position-relative"
                                                                                        style="height: 100%; overflow: hidden; position: relative;">
                                                                                        <img src="{{ asset('/' . $media->media) }}" class="rounded"
                                                                                            alt="Screenshot" style="object-fit: cover; height: 100%;">
                                                                                            <button type="button" id="deleteButton" onclick="deletePhoto()"
                                                                                                style="background-color: transparent; border: none;" data-image-id="{{ $media->id }}"><span
                                                                                                    class="material-symbols-outlined text-black-500 font-lg delete-icon"
                                                                                                    style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">delete</span>
                                                                                            </button>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                    <video class="float-right w-100">
                                                                                        <source src="{{ asset('/' . $media->media) }}" type="video/mp4">
                                                                                    </video>
                                                                                @endif
                                                                            @endforeach
                                                                        <span class="material-symbols-outlined exit" id="exit-{{ $view->post->id }}">cancel</span>
                                                                        <form class="dropzone dropzone-{{ $view->post->id }}" id="dropzone" action="{{ route('update') }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                        </form>
                                                                    </div>
                                                                    <div class="card-body d-flex p-0 mt-0">
                                                                        <p id="photoUp-{{ $view->post->id }}" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 cursor-pointer"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></p>
                                                                        <button id="updateButton-{{ $view->post->id }}" type="button" class="ms-auto p-2 lh-20 w100 me-2 text-center font-xss fw-600 ls-1 rounded-xl" style="border:none; background-color:#ffdb57;">UPDATE</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        
                                                <div class="card-body p-0 d-flex saveParent" style="cursor: pointer;">
                                                    @if (auth()->user()->bookmark()->where('post_id', $view->post->id)->exists())
                                                        <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $view->post->id }}">bookmark_remove</span>
                                                        <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $view->post->id }}" data-post-id="{{ $view->post->id }}">Unsave Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $view->post->id }}">Remove this from your saved items</span></div>
                                                    
                                                    @else
                                                        <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $view->post->id }}">bookmark_add</span>
                                                        <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 save text-{{ $view->post->id }}" data-post-id="{{ $view->post->id }}">Save Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $view->post->id }}">Add this to your saved items</span></div>
                                                    @endif
                                                </div>
                                                <div class="card-body p-0 d-flex mt-2">
                                                    <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500">Never see this post again</span></h4>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body p-0 me-lg-5">
                                        <div id="post{{ $view->post->id }}" class="post-content">
                                            @if (strlen($view->post->content) > 500)
                                                <p class="truncated-content">
                                                    {{ \Illuminate\Support\Str::limit($view->post->content, 500, $end='...') }}
                                                    @if (auth()->user()->viewed_post()->where('post_id', $view->post->id)->exists())
                                                    <a href="" class="fw-600 text-primary ms-2 see-more" id="see-more" data-post-id="{{ $view->post->id }}">See more</a>
                                                    @else
                                                    <a href="" class="fw-600 text-primary ms-2 see-more storeview" id="see-more" data-post-id="{{ $view->post->id }}">See more</a>
                                                    @endif
                                                </p>
                                                <p class="full-content" style="display: none;">
                                                    {{ $view->post->content }}
                                                    <a href="" class="fw-600 text-primary ms-2 see-less" id="see-less" data-post-id="{{ $view->post->id }}">See less</a>
                                                </p>
                                            @else
                                                <p>{{ $view->post->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                
                                        <div class="card-body d-block p-0">
                                            <div class="row ps-2 pe-2">
                                            @foreach($view->post->media as $media)
                                                @if($view->post->id === $media->post_id)
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
                                        @if (auth()->user()->likes()->where('post_id', $view->post->id)->exists())
                                            <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xs unlike" data-post-id="{{ $view->post->id }}"></i>
                                        @else
                                            <i class="feather-heart text-red me-2 btn-round-xs font-xs like" data-post-id="{{ $view->post->id }}"></i>
                                        @endif
                                        </div>
                                        <div class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                        <a id="count-{{ $view->post->id }}">{{ $view->post->postlikes()->count() }}</a>
                                        </div>
                                        
                                        <div class="d-flex align-items-center fw-600 text-grey-900 text-dark me-1 lh-26 font-xssss"><i class="feather-eye text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss" id="views-{{ $view->post->id }}">{{ $view->post->views }}</span></div>

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