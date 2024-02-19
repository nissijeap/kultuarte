<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Details</title>

    <link rel="shortcut icon" href="<?php echo url('mazer')?>/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app-dark.css">


    <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- CSS only -->
    <style>
        .page-title-box {
            position: relative;
            padding: 0 15px;
            border-radius: 14px;
        }

        .header-text {
            position: relative;
            z-index: 1; /** place in front of header bg **/
            padding: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 1px 8px 20px 3px rgba(0,0,0,0.7); 
                box-shadow: 1px 8px 20px 3px rgba(0,0,0,0.7);
        }
        .mb-4 {
            width: fit-content;
            position: relative;
            padding: 5px;
            height: 28px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 14px 1cm;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px !important;
        }
        
    </style>
</head>

<script src="<?php echo url('mazer')?>/dist/assets/static/js/initTheme.js"></script>
    <div id="app">

    @include('superadmin.sidebar')

    <div id="main" class='layout-navbar navbar-fixed'>

    @include('superadmin.header')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
                                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-3">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div>
                                            <div class="text-center page-title-box dynamic-text-color">
                                                <div class="mb-4">
                                                    <a href="javascript: void(0);" class="badge bg-light font-size-12"></a>
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    @if($post->category)
                                                    {{ $post->category->name }}
                                                    @else
                                                    No category
                                                    @endif
                                                    </a>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="text-center">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mt-4 mt-sm-0">
                                                            <p class="text-muted mb-2">Published on</p>
                                                            <h5 class="font-size-15">{{ $post->created_at->format('d M, Y') }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mt-4 mt-sm-0">
                                                            <p class="text-muted mb-2">Author</p>
                                                            <h5 class="font-size-15">
                                                                @if($post->user)
                                                                {{ $post->user->fname }} {{ $post->user->lname }}
                                                                @else
                                                                Anonymous
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mt-4 mt-sm-0">
                                                            <p class="text-muted mb-2">Updated on</p>
                                                            <h5 class="font-size-15">{{ $post->updated_at->format('d M, Y') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <hr>

                                            <div class="mt-4">

                                                <div style="max-width: 100%; overflow-x: hidden;">
                                                    <p>{!! $post->content !!}</p>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="mt-5">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                            <h5 class="font-size-15">
                                                                <i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :
                                                            </h5>

                                                            <div class="d-flex align-items-center">
                                                                <button id="likeButton" data-post-id="{{ $post->id }}" class="btn like-button" style="font-size: 20px; margin-right: -10px;">
                                                                    @if($post->isLikedByUser(auth()->user()))
                                                                        <i class="bi bi-hand-thumbs-up-fill text-primary"></i>
                                                                    @else
                                                                        <i class="bi bi-hand-thumbs-up"></i>
                                                                    @endif
                                                                </button>

                                                                <span id="totalLikes" class="ms-2" style="margin-right: 7px;">
                                                                    {{ $totalPostLikes }}
                                                                    {{ $totalPostLikes == 0 ? 'like' : 'likes' }}
                                                                </span>
                                                            </div>
                                                    </div>
                                                    <div>
                                                        @forelse($comments as $comment)
                                                            <div class="d-flex py-3 border-top">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-md profile-user-wid mb-4">
                                                                        @if ($user->photo)
                                                                            <img src="{{ asset('images/photos/' . $comment->user->photo) }}" alt="Profile Photo" class="rounded-circle user-photo">
                                                                        @else
                                                                            <div class="no-photo" >User Photo</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="font-size-14 mb-1">{{ $comment->user->fname }} {{ $comment->user->lname }} <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small></h6>
                                                                    <p class="text-muted">{{ $comment->message }}</p>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="text-muted">No comments found.</div>
                                                        @endforelse
                                                    </div>

                                                </div>


                                                <div class="mt-4">
                                                    <!-- <h5 class="font-size-16 mb-3">Leave a Comment</h5> -->

                                                    <form action="{{ route('comments.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                        <!-- Assuming you want to display the user's name -->
                                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                        <div class="mb-3">
                                                            <label for="message" class="form-label">Your Comment:</label>
                                                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
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
        document.addEventListener("DOMContentLoaded", function() {
            const likeButton = document.getElementById('likeButton');
            const totalLikesElement = document.getElementById('totalLikes');
            let isProcessing = false;

            likeButton.addEventListener('click', function() {
                if (isProcessing) {
                    return;
                }

                isProcessing = true;

                const postId = likeButton.getAttribute('data-post-id');
                const token = '{{ csrf_token() }}';

                fetch(`/posts/${postId}/toggle-like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update button text/icon based on like status
                            if (data.liked) {
                                likeButton.innerHTML = '<i class="bi bi-hand-thumbs-up-fill text-primary"></i>';
                                likeButton.classList.add('liked');
                            } else {
                                likeButton.innerHTML = '<i class="bi bi-hand-thumbs-up"></i>';
                                likeButton.classList.remove('liked');
                            }

                            // Update total likes count
                            totalLikesElement.textContent = data.totalLikes + ' ' + (data.totalLikes == 1 ? 'like' : 'likes');
                        } else {
                            console.error(data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        isProcessing = false;
                    });
            });
        });
    </script>

    </body>
</html>