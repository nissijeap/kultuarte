<div class="modal fade bs-example-modal-center" id="postModal{{ $post->id }}" data-post-id="{{ $post->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-xxl">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="w-100 rounded-xxl border-0 mb-0 p-3">
                        <div class="card-body p-0 mt-1 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                            <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{ asset('assets/images/profile-4.png') }}" alt="image" class="shadow-sm rounded-circle w30"></figure>
                            <input type="hidden" id="post_id-{{ $post->id }}" name="post_id" value="{{ $post->id }}">
                            <textarea name="content" id="content-{{ $post->id }}" class="h200 bor-0 w-100 rounded-xxl p-2 ps-5 font-xss fw-500 border-light-md theme-dark-bg postarea" cols="30" rows="10">{{ $post->content }}
                            </textarea>
                            @if(count($post->media) > 0)
                                <div class="row mt-2 ms-5" style="height: 100px; overflow-y: scroll; width: 90%; overflow-x: hidden;">
                                    @foreach($post->media as $media)
                                        @php
                                            $mediaPath = public_path($media->media);
                                            $imageInfo = @getimagesize($mediaPath);
                                            $isImage = $imageInfo !== false;
                                        @endphp
                                        @if($isImage)
                                            <div class="col-md-4 mb-3 image-container" id="image-container-{{ $media->id }}" style="padding-left: 0% !important;">
                                                <div class="card position-relative" style="height: 100%; overflow: hidden; position: relative;">
                                                    <img src="{{ asset('/' . $media->media) }}" class="rounded" alt="Screenshot" style="object-fit: cover; height: 100%;">
                                                    <button type="button" class="deleteButton" id="deleteButton-{{ $media->id }}" style="background-color: transparent; border: none;" data-image-id="{{ $media->id }}">
                                                        <span class="material-symbols-outlined text-black-500 font-lg delete-icon" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-4 mb-3 image-container" id="image-container-{{ $media->id }}" style="padding-left: 0% !important;">
                                                <div class="card position-relative" style="height: 100%; overflow: hidden; position: relative;">
                                                    <video class="rounded" alt="Video" style="object-fit: cover; height: 100%;">
                                                        <source src="{{ asset('/' . $media->media) }}" type="video/mp4">
                                                    </video>
                                                    <button type="button" class="deleteButton" id="deleteButton-{{ $media->id }}" style="background-color: transparent; border: none;" data-image-id="{{ $media->id }}">
                                                        <span class="material-symbols-outlined text-black-500 font-lg delete-icon" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-1">
                                <span class="material-symbols-outlined exitUpdate" id="exit-{{ $post->id }}">cancel</span>
                                <form class="dropzone dropzone-{{ $post->id }}" id="dropzone" action="{{ route('update') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="card-body d-flex p-0 mt-0">
                            <p id="photoUp-{{ $post->id }}" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 cursor-pointer"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></p>
                            <button id="updateButton-{{ $post->id }}" type="button" class="ms-auto p-2 lh-20 w100 me-2 text-center font-xss text-white fw-600 ls-1 rounded-xl" style="border:none; background-color:#e15600;">UPDATE</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>