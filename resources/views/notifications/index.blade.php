<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/widgets.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:10:41 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
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
<body class="sidebar-icon-only">
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
              Notifications
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notifications</li>
              </ol>
            </nav>
          </div>
            <div class="row">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">My Total Arts Postings</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">{{ $postCount }}</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class=" ml-1 mb-0">Updated: {{ $latestPost->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Number of arts postings.</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-paint-brush text-info icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">My Total Blog Postings</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">{{ $blogCount }}</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: {{ $latestBlog->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Number of blog postings.</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-newspaper text-danger icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card"  style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <h4 class="card-title">Todo</h4>
                            <div class="add-items d-flex">
                                <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
                                <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Meeting with Alisa
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked>
                                                Call John
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Create invoice
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Print Statements
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked>
                                                Prepare for presentation
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Pick up kids from school
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Meeting with Alisa
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked>
                                                Call John
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Create invoice
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Print Statements
                                            </label>
                                        </div>
                                        <i class="remove fa fa-times-circle"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card text-center"   style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            @auth
                                @if (Auth::user()->photo)
                                    <div class="profile-image d-flex justify-content-center">
                                        <img src="{{ asset('images/photos/' . Auth::user()->photo) }}" alt="Profile Photo" class="img-lg rounded-circle mb-2" style="width: 60px; height: 60px; object-fit: cover;">
                                    </div>        
                                @else
                                    <div class="profile-image d-flex justify-content-center">
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>
                                @endif
                            @endauth

                            @php
                            $user = Auth::user();
                            @endphp
                            @if ($user)
                            <h4>{{$user->name}}</h4>

                            <p class="text-muted"> 
                                @forelse ($user->getRoleNames() as $role)
                                    {{ $role }}
                                    @empty
                                    No role assigned.
                                    @endforelse
                                </p>
                                @endif
                            <p class="mt-4 card-text">
                                    KultuArte: Design and Development of a Culture and
                                    Visual Arts Web Application for Iligan City.
                            </p>
                            <button class="btn btn-info btn-sm mt-3 mb-4">Profile</button>
                            <div class="border-top pt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>{{ $totalViews }}</h6>
                                        <p>Views</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $totalLikesCount}}</h6>
                                        <p>Likes</p>
                                    </div>
                                    <div class="col-4">
                                        <h6>{{ $totalCommentsCount}}</h6>
                                        <p>Comments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                <div class="card" style="height: 400px; overflow-y: auto;">
                    <div class="card-body">
                        <h4 class="card-title">Updates</h4>
                        <ul class="solid-bullet-list">
                            @forelse($notifications->reverse() as $notification)
                            <li>
                                <h6>{{ $notification->message }}</h6>
                                <p class="text-muted">
                                    <i class="far fa-clock"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </li>
                            @empty
                            <p>No updates for now.</p>
                            @endforelse

                            
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <button class="btn btn-social-icon btn-facebook btn-rounded">
                            <i class="fab fa-facebook-f"></i>
                            </button>
                            <div class="ml-4">
                            <h5 class="mb-0">Facebook</h5>
                            <p class="mb-0">813 friends</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <button class="btn btn-social-icon btn-twitter btn-rounded">
                            <i class="fab fa-twitter"></i>
                            </button>
                            <div class="ml-4">
                            <h5 class="mb-0">Twitter</h5>
                            <p class="mb-0">9000 followers</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <button class="btn btn-social-icon btn-google btn-rounded">
                            <i class="fab fa-google-plus-g"></i>
                            </button>
                            <div class="ml-4">
                            <h5 class="mb-0">Google plus</h5>
                            <p class="mb-0">780 friends</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-social-icon btn-linkedin btn-rounded">
                            <i class="fab fa-linkedin-in"></i>
                            </button>
                            <div class="ml-4">
                            <h5 class="mb-0">Linkedin</h5>
                            <p class="mb-0">1090 connections</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Arts Postings</h4>
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <p class="card-description">What artworks are shared?</p>
                            @forelse($posts as $post)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="profile-image d-flex justify-content-center">
                                    @if($post->user->photo)
                                        <img src="{{ asset('images/photos/' . $post->user->photo) }}" alt="{{ $post->user->name }}" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>{{ $post->user->name }}</b> posted a new artwork.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- <i class="far fa-clock text-muted mr-1"></i> -->
                                            <p class="text-muted mb-0">{{ Str::limit($post->content, 25) }}</p>
                                        </div>
                                        <small class="text-muted ml-auto"><i class="far fa-clock text-muted mr-1"></i>{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No artworks posted.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Blog Postings</h4>
                                <i class="fa fa-newspaper"></i>
                            </div>
                            <p class="card-description">What cultural escapes are published?</p>
                            @forelse($blogs as $blog)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="profile-image d-flex justify-content-center">
                                    @if($blog->user->photo)
                                        <img src="{{ asset('images/photos/' . $blog->user->photo) }}" alt="{{ $blog->user->name }}" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>{{ $blog->user->name }}</b> published a new blog.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- <i class="far fa-clock text-muted mr-1"></i> -->
                                            <p class="text-muted mb-0">{{ Str::limit($blog->title, 25) }}</p>
                                        </div>
                                        <small class="text-muted ml-auto"><i class="far fa-clock text-muted mr-1"></i>{{ $blog->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No blogs published.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Emails</h4>
                                <i class="fa fa-envelope"></i>
                            </div>
                            <p class="card-description">What are the emails sent/received?</p>
                            @forelse($emails as $email)
                            <div class="list d-flex align-items-center border-bottom py-3">


                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>Subject:</b> {{ Str::limit($email->subject, 25) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fas fa-arrow-left text-muted mr-1"></i> From: {{ Str::limit($email->send_email, 25) }}</p>
                                            <p class="text-muted mb-0"><i class="fas fa-arrow-right text-muted mr-1"></i> To: {{ Str::limit($email->rcpt_email, 25) }}</p>
                                        </div>
                                        <small class="text-muted"><i class="far fa-clock text-muted mr-1"></i>{{ $email->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No emails sent/received.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Likes</h4>
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <p class="card-description">What postings/blogs are liked?</p>
                            @forelse($likes as $like)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="profile-image d-flex justify-content-center">
                                    @if($like->user->photo)
                                        <img src="{{ asset('images/photos/' . $like->user->photo) }}" alt="{{ $like->user->name }}" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>{{ $like->user->name }}</b> liked a post/blog.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- <i class="far fa-clock text-muted mr-1"></i> -->
                                            <p class="text-muted mb-0"> {{ Str::limit($like->post->content ?? $like->blog->title, 25) }}</p>
                                        </div>
                                        <small class="text-muted ml-auto"><i class="far fa-clock text-muted mr-1"></i>{{ $like->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No posts/blogs liked.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Comments</h4>
                                <i class="fa fa-comment"></i>
                            </div>
                            <p class="card-description">What postings/blogs are commented?</p>
                            @forelse($comments as $comment)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="profile-image d-flex justify-content-center">
                                    @if($comment->user->photo)
                                        <img src="{{ asset('images/photos/' . $comment->user->photo) }}" alt="{{ $comment->user->name }}" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>{{ $comment->user->name }}</b> commented a post/blog.</b></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- <i class="far fa-clock text-muted mr-1"></i> -->
                                            <p class="text-muted mb-0"><b> {{ Str::limit($comment->post->content ?? $comment->blog->title, 25) }}</p>
                                        </div>
                                        <small class="text-muted ml-auto"><i class="far fa-clock text-muted mr-1"></i>{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No posts/blogs commented.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
                <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Users</h4>
                                <i class="fa fa-users"></i>
                            </div>
                            <p class="card-description">Who are the registered users?</p>
                            @forelse($users as $user)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="profile-image d-flex justify-content-center">
                                    @if($user->photo)
                                        <img src="{{ asset('images/photos/' . $user->photo) }}" alt="{{ $user->name }}" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="img-lg rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </div>

                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>{{ $user->name }}</b> is now a registered user.</b></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <!-- <i class="far fa-clock text-muted mr-1"></i> -->
                                            <p class="text-muted mb-0">
                                                @forelse ($user->getRoleNames() as $role)
                                                    Role: {{ $role }}.
                                                    @empty
                                                    No role assigned.
                                                    @endforelse
                                            </p>
                                        </div>
                                        <small class="text-muted ml-auto"><i class="far fa-clock text-muted mr-1"></i>{{ $user->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No posts/blogs commented.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('superadmin.layouts.footer')
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo url('melody')?>/js/off-canvas.js"></script>
  <script src="<?php echo url('melody')?>/js/hoverable-collapse.js"></script>
  <script src="<?php echo url('melody')?>/js/misc.js"></script>
  <script src="<?php echo url('melody')?>/js/settings.js"></script>
  <script src="<?php echo url('melody')?>/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/widgets.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:10:42 GMT -->
</html>
