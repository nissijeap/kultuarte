<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar navbar-primary">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('superadmin.dashboard')}}"><img src="<?php echo url('melody')?>/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('superadmin.dashboard')}}"><img src="<?php echo url('melody')?>/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
      
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        @if (auth()->user()->hasRole('Super Admin'))
        <li class="nav-item dropdown">
                @php
                    $notifications = \App\Models\Notification::where('is_read', 0)->latest()->get();
                    $notificationsCount = $notifications->count();
                @endphp
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="fas fa-bell mx-0"></i>
                    <span class="count">{{ $notificationsCount }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <a href="{{route('notifications.index')}}" class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have {{ $notificationsCount }} new notifications</p>
                        <span class="badge badge-pill badge-warning float-right">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    @foreach($notifications as $notification)
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            @if($notification->blog)
                                <div class="preview-icon bg-warning">
                                    <i href="{{ route('posts.show', $notification->blog->id) }}" class="fas fa-newspaper mx-0"></i>
                                </div>
                            @elseif($notification->post)
                                <div class="preview-icon bg-primary">
                                    <i href="{{ route('blogs.show', $notification->post->id) }}" class="fas fa-paint-brush mx-0"></i>
                                </div>
                            @elseif($notification->like)
                                @if($notification->like->post)
                                  <div class="preview-icon bg-info">
                                      <i href="{{ route('posts.show', $notification->like->post->id) }}" class="fas fa-thumbs-up mx-0"></i>
                                  </div>
                                @elseif($notification->like->blog)
                                  <div class="preview-icon bg-info">
                                      <i href="{{ route('blogs.show', $notification->like->blog->id) }}" class="fas fa-thumbs-up mx-0"></i>
                                  </div>
                                @endif
                            @elseif($notification->comment)
                                @if($notification->comment->post)
                                  <div class="preview-icon bg-danger">
                                      <i href="{{ route('posts.show', $notification->comment->post->id) }}" class="fas fa-comment mx-0"></i>
                                  </div>
                                @elseif($notification->comment->blog)
                                  <div class="preview-icon bg-danger">
                                      <i href="{{ route('blogs.show', $notification->comment->blog->id) }}" class="fas fa-comment mx-0"></i>
                                  </div>
                                @endif
                            @elseif($notification->user)
                                <div class="preview-icon bg-success">
                                    <i href="{{ route('users.show', $notification->user->id) }}"class="fas fa-user mx-0"></i>
                                </div>
                            @else
                                <div class="preview-icon bg-secondary">
                                    <i class="far fa-envelope mx-0"></i>
                                </div>
                            @endif

                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium">{{ $notification->message }}</h6>
                                <p class="font-weight-light small-text">{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
        @else
            <li class="nav-item dropdown">
            @php
                  $user = Auth::user();
                  $notifications = \App\Models\Notification::where(function ($query) use ($user) {
                      $query->whereHas('post', function ($q) use ($user) {
                          $q->where('user_id', $user->id);
                      })
                      ->orWhereHas('blog', function ($q) use ($user) {
                          $q->where('user_id', $user->id);
                      })
                      ->orWhereHas('like', function ($q) use ($user) {
                          $q->where('user_id', $user->id);
                      })
                      ->orWhereHas('comment', function ($q) use ($user) {
                          $q->where('user_id', $user->id);
                      });
                  })
                  ->where('is_read', 0)
                  ->latest()
                  ->get();

                  $notificationsCount = $notifications->count();
              @endphp

                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="fas fa-bell mx-0"></i>
                    <span class="count">{{ $notificationsCount }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <a href="#" class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have {{ $notificationsCount }} new notifications</p>
                        <span href="{{route('notifications.index')}}" class="badge badge-pill badge-warning float-right">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                           @foreach($notifications as $notification)
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            @if($notification->blog)
                                <div class="preview-icon bg-warning">
                                    <i class="fas fa-newspaper mx-0"></i>
                                </div>
                            @elseif($notification->post)
                                <div class="preview-icon bg-primary">
                                    <i class="fas fa-paint-brush mx-0"></i>
                                </div>
                            @elseif($notification->like)
                                <div class="preview-icon bg-info">
                                    <i class="fas fa-thumbs-up mx-0"></i>
                                </div>
                            @elseif($notification->comment)
                                <div class="preview-icon bg-danger">
                                    <i class="fas fa-comment mx-0"></i>
                                </div>
                            @else
                                <div class="preview-icon bg-secondary">
                                    <i class="far fa-envelope mx-0"></i>
                                </div>
                            @endif

                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium">{{ $notification->message }}</h6>
                                <p class="font-weight-light small-text">{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
        @endif

        <li class="nav-item dropdown">
              @php
                  $user = Auth::user();
                  $emails = \App\Models\Email::where('rcpt_email', $user->email)->where('status', 0)->latest()->get();
                  $emailsCount = $emails->count();
              @endphp

              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-envelope mx-0"></i>
                  <span class="count">{{ $emailsCount }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <div class="dropdown-item">
                      <p class="mb-0 font-weight-normal float-left">You have {{ $emailsCount }} unread mails</p>
                      <span class="badge badge-info badge-pill float-right">View all</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  @foreach($emails as $email)
                      <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          @if($notification->sender && $notification->sender->photo)
                              <img src="{{ $notification->sender->photo }}" alt="image" class="profile-pic">
                          @else
                              <img src="{{ url('melody/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                          @endif
                      </div>
                          <div class="preview-item-content flex-grow">
                              <h6 class="preview-subject ellipsis font-weight-medium">{{ $email->send_name }}
                                  <span class="float-right font-weight-light small-text">{{ $email->created_at->diffForHumans() }}</span>
                              </h6>
                              <p class="font-weight-light small-text">
                                  {{ $email->subject }}
                              </p>
                          </div>
                      </a>
                      <div class="dropdown-divider"></div>
                  @endforeach
              </div>
          </li>

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            @auth
                @if (Auth::user()->photo)
                      <img src="{{ asset('images/photos/' . Auth::user()->photo) }}" alt="Profile Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  @else
                      <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                @endif
            @endauth


            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
              </form>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->


