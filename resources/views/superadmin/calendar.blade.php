<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
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
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo url('melody')?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo url('melody')?>/images/favicon.png" />
</head>

<body>
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
            <div class="col-md-3">
              <div class="fc-external-events">
                <div class='fc-event'>
                  <p>Deciphering Marketing Lingo For Small Business Owners</p>
                  <p class="small-text"></p>
                  <p class="text-muted mb-0">Georgia</p>
                </div>
                <div class='fc-event'>
                  <p>Influencing The Influencer</p>
                  <p class="small-text"></p>
                  <p class="text-muted mb-0">Netherlands</p>
                </div>
                <div class='fc-event'>
                  <p>Profiles Of The Powerful Advertising Exec Steve Grasse</p>
                  <p class="small-text"></p>
                  <p class="text-muted mb-0">Canada</p>
                </div>
              </div>
              <div class="mt-4">
                <p>Filter board</p>
                <div class="form-check form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked>
                    Project Board
                  </label>
                </div>
                <div class="form-check form-check-danger">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked>
                    Kamban Board
                  </label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked>
                    Summary Board
                  </label>
                </div>
                <div class="form-check form-check-success">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked>
                    Planner Board
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fullcalendar</h4>
                  <div id="calendar" class="full-calendar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:<?php echo url('melody')?>/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
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
