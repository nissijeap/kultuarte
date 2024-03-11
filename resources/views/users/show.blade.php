<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KultuArte: Culture and Visual Arts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{url('guest/assets/img/logo.png')}}" rel="icon">
    <link href="{{url('guest/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo url('melody') ?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo url('melody') ?>/images/favicon.png" />
</head>

<body class="sidebar-icon-only sidebar-dark">
    <div class="container-scroller">
        @include('superadmin.layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('superadmin.layouts.settings')
            @include('superadmin.layouts.sidebar')
            <!-- main panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Approval for User ID #{{ $user->id }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="border-bottom text-center pb-4">
                            <div class="user-photo-container">
                                @if ($user->photo)
                                    <img src="{{ asset('images/photos/' . $user->photo) }}" alt="Profile Photo" class="shadow-sm rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="shadow-sm rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                @endif
                            </div><br>

                            <div>
                                <h3> {{ $user->name }}</h3>
                                <p>
                                  @forelse ($user->getRoleNames() as $role)
                                  <span>{{ $role }}</span>
                                  @empty
                                  @endforelse
                                </p>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                              <div class="d-flex justify-content-between">
                                <a class="badge badge-primary mr-1" style="color:white">
                                  Actions
                              </a>

                                    <a href="{{ route('emails.create', ['rcpt_email' => $user->email]) }}" class="badge badge-outline-dark mr-1"><i class="fas fa-envelope"></i> Email</a>
                                    <a href="{{ route('chatify') }}" class="badge badge-outline-dark mr-1"><i class="fas fa-comments"></i> Chat</a>
                                    <a href="{{ route('permissions.index') }}" class="badge badge-outline-dark mr-1"><i class="fas fa-key"></i> Permissions</a>
                                    @forelse ($user->getRoleNames() as $roleName)
                                      @php
                                          $role = \Spatie\Permission\Models\Role::where('name', $roleName)->first();
                                      @endphp
                                      @if ($role)
                                          <a href="{{ route('roles.show', ['id' => $role->id]) }}" class="badge badge-outline-dark mr-1"><i class="fas fa-lock"></i> Role</a>
                                      @endif
                                      @empty
                                    @endforelse
                                    
                                </div>

                              </div>

                            @if($user->is_approved == 1)
                            <div class="col-md-8">
                              <div class="d-flex justify-content-end">
                                  <span class="btn btn-success approve-btn"  style="margin-right: 15px;"><i class="fas fa-check"></i> Approved</span>

                                  <form action="{{ route('users.deny', ['id' => $user->id]) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger deny-btn">
                                          <i class="fas fa-times"></i>
                                      </button>
                                  </form>
                              </div>
                            </div>
                            @elseif($user->is_approved == 2)
                            <div class="col-md-8">
                              <div class="d-flex justify-content-end">
                                  <span class="btn btn-danger approve-btn"  style="margin-right: 15px;"><i class="fas fa-times"></i> Denied</span>
                                  <form action="{{ route('users.approve', ['id' => $user->id]) }}" method="POST" class="mr-2">
                                      @csrf
                                      <button type="submit" class="btn btn-success approve-btn">
                                          <i class="fas fa-check"></i>
                                      </button>
                                  </form>
                                </div>
                            </div>
                            @else
                            <div class="col-md-8">
                                  <div class="d-flex justify-content-end">
                                      <form action="{{ route('users.approve', ['id' => $user->id]) }}" method="POST" class="mr-2">
                                          @csrf
                                          <button type="submit" class="btn btn-success approve-btn">
                                              <i class="fas fa-check"></i> Approve
                                          </button>
                                      </form>
                                      <form action="{{ route('users.deny', ['id' => $user->id]) }}" method="POST">
                                          @csrf
                                          <button type="submit" class="btn btn-danger deny-btn">
                                              <i class="fas fa-times"></i> Deny
                                          </button>
                                      </form>
                                  </div>
                              </div>
                            @endif
                          </div>
                    </div>

                      
                      <div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Approval Status
                          </span>

                          @if($user->is_approved == 1)
                              <span class="float-right" style="color: green;">Approved</span>
                          @elseif($user->is_approved == 2)
                              <span class="float-right"  style="color: red;">Denied</span>
                          @else
                              <span class="float-right"  style="color: orange;">Pending</span>
                          @endif
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Full Name
                          </span>
                          <span class="float-right text-muted">
                          {{ $user->name }}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Role
                          </span>
                          <span class="float-right text-muted">
                          @forelse ($user->getRoleNames() as $roleName)
                          @php
                              $role = \Spatie\Permission\Models\Role::where('name', $roleName)->first();
                          @endphp
                          @if ($role)
                          {{ $role->name }}
                          @endif
                          @empty
                        @endforelse
                          </span>
                        </p>
                       
                        <p class="clearfix">
                          <span class="float-left">
                            Phone Number
                          </span>
                          <span class="float-right text-muted">
                          {{ $user->phone }}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Email Address
                          </span>
                          <span class="float-right text-muted">
                          {{ $user->email }}
                          </span>
                        </p>
                        
                      </div>
                      <button class="btn btn-primary btn-block">Profile</button>
                    </div>
                  </div>
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
    <script src="<?php echo url('melody') ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo url('melody') ?>/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?php echo url('melody') ?>/js/off-canvas.js"></script>
    <script src="<?php echo url('melody') ?>/js/hoverable-collapse.js"></script>
    <script src="<?php echo url('melody') ?>/js/misc.js"></script>
    <script src="<?php echo url('melody') ?>/js/settings.js"></script>
    <script src="<?php echo url('melody') ?>/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo url('melody') ?>/js/file-upload.js"></script>
    <script src="<?php echo url('melody') ?>/js/typeahead.js"></script>
    <script src="<?php echo url('melody') ?>/js/select2.js"></script>
    <!-- End custom js for this page-->

</body>

</html>
