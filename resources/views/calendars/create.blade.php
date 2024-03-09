<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
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
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo url('melody')?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo url('melody')?>/images/favicon.png" />
</head>

<body class="sidebar-icon-only sidebar-dark">
  <div class="container-scroller">
    @include('superadmin.layouts.navbar')
    <div class="container-fluid page-body-wrapper">
    @include('superadmin.layouts.settings')
    @include('superadmin.layouts.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Calendar
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
              </ol>
            </nav>
          </div>

          <div class="row">
    <div class="col-lg-12 grid-margin d-flex align-items-stretch">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Event</h4>
                        <p class="card-description">Select a date to schedule events.</p>
                        <form method="POST" action="{{ route('calendars.store') }}">
                          @csrf
                          <div class="form-group row">
                              <div class="col-12">
                                  <label>Category</label>
                                  <select name="category_id" class="form-control">
                                      @foreach($categories as $category)
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-12">
                                  <label>Title</label>
                                  <input type="text" name="title" class="form-control" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-12">
                                  <label>Description</label>
                                  <textarea name="description" class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-6">
                                  <label>Start Date</label>
                                  <input type="date" name="start_date" class="form-control" required>
                              </div>
                              <div class="col-6">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time" class="form-control" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-6">
                                  <label>End Date</label>
                                  <input type="date" name="end_date" class="form-control" required>
                              </div>
                              <div class="col-6">
                                  <label>End Time</label>
                                  <input type="time" name="end_time" class="form-control" required>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                  <a href="{{ route('calendars.index') }}" class="btn btn-light">Cancel</a>
                              </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

          
         
        </div>
        <!-- content-wrapper ends -->
       @include('superadmin.layouts.footer')
        <!-- partial -->
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
  <!-- inject:js -->
  <script src="<?php echo url('melody')?>/js/off-canvas.js"></script>
  <script src="<?php echo url('melody')?>/js/hoverable-collapse.js"></script>
  <script src="<?php echo url('melody')?>/js/misc.js"></script>
  <script src="<?php echo url('melody')?>/js/settings.js"></script>
  <script src="<?php echo url('melody')?>/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo url('melody')?>/js/calendar.js"></script>
  <!-- End custom js for this page-->
</body>

<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:24 GMT -->
</html>
