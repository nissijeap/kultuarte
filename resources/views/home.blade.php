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
                                <h3 style="font-weight:bold !important;">Home</h3>
                            </div>

                                @forelse($posts as $post)
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $post->user->name }}  <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span></h4>
                                        <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                        data-bs-target="#dropdown-menu"aria-expanded="false" aria-controls="collapseExample">
                                            <i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                        @if ($post->user_id === auth()->user()->id)
                                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        
                                                <div class="card-body p-0 d-flex mt-2">
                                                    <button type="button" class="card-body p-0 d-flex" data-post-id="{{ $post->id }}" style="border: none;background: none;color: inherit;text-decoration: none; text-align: left;" data-bs-toggle="modal" data-bs-target="#postModal{{ $post->id }}"><span class="material-symbols-outlined text-black-500 me-3 font-lg">edit</span><h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $post->id }}" data-post-id="{{ $post->id }}">Edit Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $post->id }}">Modify this post</span></h4></button>
                                                   
                                                    
                                                </div>
                                                <div class="card-body p-0 d-flex" style="cursor: pointer;">
                                                    <form id="deleteForm{{ $post->id }}" action="{{ route('destroy', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="card-body p-0 d-flex" data-post-id="{{ $post->id }}" style="border: none;background: none;color: inherit;text-decoration: none; text-align: left;"><span class="material-symbols-outlined text-black-500 me-3 font-lg">delete</span><h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $post->id }}" data-post-id="{{ $post->id }}">Delete Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $post->id }}">Remove this from your timeline</span></h4></button>
                                                    </form>
                                                </div>
                                            </div>
                                            @include('posts.modal')
                                        @else
                                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        
                                                <div class="card-body p-0 d-flex saveParent" style="cursor: pointer;">
                                                    @if (auth()->user()->bookmark()->where('post_id', $post->id)->exists())
                                                        <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $post->id }}">bookmark_remove</span>
                                                        <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 unsave text-{{ $post->id }}" data-post-id="{{ $post->id }}">Unsave Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $post->id }}">Remove this from your saved items</span></div>
                                                    
                                                    @else
                                                        <span class="material-symbols-outlined text-black-500 me-3 font-lg" id="bookmark-{{ $post->id }}">bookmark_add</span>
                                                        <div class="fw-600 text-grey-900 font-xssss mt-0 me-4 save text-{{ $post->id }}" data-post-id="{{ $post->id }}">Save Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500 smallText-{{ $post->id }}">Add this to your saved items</span></div>
                                                    @endif
                                                </div>
                                                <div class="card-body p-0 d-flex mt-2">
                                                    <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 lh-3 text-grey-500">Never see this post again</span></h4>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body p-0 me-2 ms-2">
                                        <div id="post{{ $post->id }}" class="post-content">
                                            @if (strlen($post->content) > 500)
                                                <p class="truncated-content" style="text-align: justify !important;">
                                                    {{ \Illuminate\Support\Str::limit($post->content, 500, $end='...') }}
                                                    @if (auth()->user()->viewed_post()->where('post_id', $post->id)->exists())
                                                    <a href="" class="fw-600 text-primary ms-2 see-more" id="see-more" data-post-id="{{ $post->id }}">See more</a>
                                                    @else
                                                    <a href="" class="fw-600 text-primary ms-2 see-more storeview" id="see-more" data-post-id="{{ $post->id }}">See more</a>
                                                    @endif
                                                </p>
                                                <p class="full-content" style="display: none; text-align: justify !important;">
                                                    {{ $post->content }}
                                                    <a href="" class="fw-600 text-primary ms-2 see-less" id="see-less" data-post-id="{{ $post->id }}">See less</a>
                                                </p>
                                            @else
                                                <p>{{ $post->content }}</p>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="card-body p-0">
                                        <div class="row ps-2 pe-2">
                                            <div style="overflow: hidden;">
                                                <!-- Carousel Start -->
                                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @php $active = 'active'; $index = 0; @endphp
                                                        @foreach($medias as $media)
                                                            @if($post->id === $media->post_id)
                                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $active }}"></li>
                                                            @php $active = ''; $index = $index + 1; @endphp
                                                            @endif
                                                        @endforeach
                                                    </ol>

                                                    <div class="carousel-inner">
                                                        @php $active = 'active'; @endphp
                                                        @foreach($medias as $media)
                                                            @if($post->id === $media->post_id)
                                                                @php
                                                                    $mediaPath = public_path($media->media);
                                                                    $imageInfo = @getimagesize($mediaPath);
                                                                    $isImage = $imageInfo !== false;
                                                                @endphp

                                                                <div class="carousel-item {{ $active }}">
                                                                    @if($isImage)
                                                                        <img src="{{ asset('/' . $media->media) }}" class="rounded-3 w-100" alt="image">
                                                                    @else
                                                                        <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                                                                            <div class="player bg-transparent shadow-none">
                                                                                <video class="video-js" id="my-video-{{ $loop->index }}" controls preload="auto" style="width: 100%; height: auto;">
                                                                                    <source src="{{ asset('/' . $media->media) }}" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @php $active = ''; @endphp
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    @if ($medias->count() > 1)
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                    @endif
                                                </div>
                                                <!-- Carousel End -->
                                            </div>
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
                                        
                                        <div class="d-flex align-items-center fw-600 text-grey-900 text-dark me-1 lh-26 font-xssss"><i class="feather-eye text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss" id="views-{{ $post->id }}">{{ $post->views }}</span></div>

                                        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss commentLink" data-post-id="{{ $post->id }}"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss" id="commentCount-{{ $post->id }}">{{ $post->comments()->count() }}</span></a>
                                    </div><hr>

                                    <div class="card-body p-0" style="display:none; max-height: 250px; overflow-y: scroll; overflow-x:hidden; scrollbar-width: none;" id="userComments-{{ $post->id }}">
                                        @forelse($post->comments as $comment)
                                            <div class="row" id="delComment-{{ $comment->id }}">
                                                <div class="d-flex flex-start" id="userReplies-{{ $comment->id }}">
                                                    @if($comment->parent_comment_id === null)
                                                        <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                    @endif
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        @if($comment->parent_comment_id === null)
                                                            <div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $comment->user->name }} &#xb7 <span class="font-xsssss fw-500 mt-1 lh-3 text-grey-500">{{ $comment->created_at->diffForHumans() }}</span></h4>
                                                                    
                                                                    <a href="#!" class="d-flex align-items-center justify-content-center reply" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}" id="reply-{{ $comment->id }}"><span class="material-symbols-outlined">reply</span>reply</a>
                                                                </div>
                                                                <p class="small mb-0" id="editComment-{{ $comment->id }}">
                                                                    {{ $comment->comment }}
                                                                </p>
                                                                
                                                                @if (auth()->user()->comment_likes()->where('comment_id', $comment->id)->exists())
                                                                        <span class="material-symbols-outlined font-xssss downvote" id="upvote-{{ $comment->id }}" data-comment-id="{{ $comment->id }}" style="cursor: pointer; color: #e15600;">thumb_up</span><span class="font-xssss" id="upCount-{{ $comment->id }}">&nbsp;{{ $comment->upvotes }}</span>
                                                                    @else
                                                                        <span class="material-symbols-outlined font-xssss upvote" id="upvote-{{ $comment->id }}" data-comment-id="{{ $comment->id }}" style="cursor: pointer;">thumb_up</span><span class="font-xssss" id="upCount-{{ $comment->id }}">&nbsp;{{ $comment->upvotes }}</span> 
                                                                    @endif &#xb7 
                                                                @if($comment->user->id === auth()->user()->id)
                                                                    <a href="#" class="font-xssss editComment" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}" data-comment-content="{{ $comment->comment }}">Edit</a> &#xb7
                                                                    <a href="#" class="font-xssss deleteComment" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}" data-post-id="{{ $post->id }}">Delete</a>
                                                                @endif
                                                            </div>
                                                        @endif

                                                        @foreach ($comment->replies as $reply)
                                                            <div class="d-flex  flex-start mt-1" id="delComment-{{ $reply->id }}">
                                                                <figure class="avatar me-3"><img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                                                <div class="flex-grow-1 flex-shrink-1">
                                                                    <div>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $reply->user->name }} &#xb7 <span class="font-xsssss fw-500 mt-1 lh-3 text-grey-500">{{ $reply->created_at->diffForHumans() }}</span></h4>
                                                                    
                                                                    </div>
                                                                    <p class="small mb-0" id="editComment-{{ $reply->id }}">
                                                                        {{ $reply->comment }}
                                                                    </p>
                                                                    @if (auth()->user()->comment_likes()->where('comment_id', $comment->id)->exists())
                                                                        <span class="material-symbols-outlined font-xssss downvote" id="upvote-{{ $reply->id }}" data-comment-id="{{ $reply->id }}" style="cursor: pointer; color: #e15600;">thumb_up</span><span class="font-xssss" id="upCount-{{ $reply->id }}">&nbsp;{{ $reply->upvotes }}</span>
                                                                    @else
                                                                        <span class="material-symbols-outlined font-xssss upvote" id="upvote-{{ $reply->id }}" data-comment-id="{{ $reply->id }}" style="cursor: pointer;">thumb_up</span><span class="font-xssss" id="upCount-{{ $reply->id }}">&nbsp;{{ $reply->upvotes }}</span> 
                                                                    @endif
                                                                    &#xb7
                                                                    @if($reply->user->id === auth()->user()->id) 
                                                                        <a href="#" class="font-xssss editComment" style="color: #e15600 !important;" data-comment-id="{{ $reply->id }}" data-comment-content="{{ $reply->comment }}">Edit</a> &#xb7
                                                                        <a href="#" class="font-xssss deleteComment" style="color: #e15600 !important;" data-comment-id="{{ $reply->id }}" data-post-id="{{ $post->id }}">Delete</a>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="flex-start mt-1 mb-3" style="display:none;" id="userReply-{{ $comment->id }}">
                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                <img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45 me-1">
                                                                <textarea data-comment-id="{{ $comment->id }}" class="auto-resize-textarea rounded-xl theme-dark-bg bg-grey font-xssss fw-500 border-0 lh-5 pt-2 pb-2 ps-3 pe-3" id="commentReply-{{ $comment->id }}" placeholder="Write a comment" rows="1"></textarea>
                                                                <button type="button" style="border: none; background: none;" class="sendReply" data-comment-id="{{ $comment->id }}" data-post-id="{{ $post->id }}" id="send-{{ $comment->id }}" disabled><span class="material-symbols-outlined">send</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="card-body p-0 mt-1 d-flex align-items-center justify-content-center" id="writeComments-{{ $post->id }}">
                                        <img src="{{ asset('assets/images/user-7.png') }}" alt="image" class="shadow-sm rounded-circle w45 me-1">
                                        <textarea data-post-id="{{ $post->id }}" class="comment-textarea rounded-xl theme-dark-bg bg-grey font-xssss fw-500 border-0 lh-5 pt-2 pb-2 ps-3 pe-3" id="commentContent-{{ $post->id }}" placeholder="Write a comment" rows="1"></textarea>
                                        <button type="button" style="border: none; background: none;" class="send" data-post-id="{{ $post->id }}" id="send-{{ $post->id }}" disabled><span class="material-symbols-outlined">send</span></button>
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
        var commentRoute= "{{ route('comment') }}";
        var delComment= "{{ route('deleteComment') }}";
        var editComment= "{{ route('editComment') }}";
        var upvoteRoute= "{{ route('upvote') }}";
        var save= "{{ route('save') }}";
        var update= "{{ route('update') }}";
        var unsave= "{{ route('unsave') }}";
        var destroyImg= "{{ route('destroyImg') }}";
        var viewed= "{{ route('viewed') }}";
        var user_id = "{{ auth()->user()->id }}";
        var assetBaseUrl = '{{ asset('') }}';
    </script>


@endsection