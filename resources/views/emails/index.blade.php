<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:09 GMT -->
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

<body class="sidebar-icon-only">
  <div class="container-scroller">
    @include('superadmin.layouts.navbar')
    <div class="container-fluid page-body-wrapper">

    @include('superadmin.layouts.settings')
    
    @include('superadmin.layouts.sidebar')


  <!-- main-panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
              <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
              @include('emails.menu')
              </div>
              <div class="mail-list-container col-md-10 pt-4 pb-4 border-right bg-white">
                <div class="border-bottom pb-4 mb-3 px-3">
                  <div class="form-group">
                    <input class="form-control w-100" type="search" placeholder="Search mail" id="Mail-rearch">
                  </div>
                </div>
                <div class="mail-list">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
                  <div class="content">
                    <p class="sender-name">David Moore</p>
                    <p class="message_text">Hi Emily, Please be informed that the new project presentation is due Monday.</p>
                  </div>
                  <div class="details">
                    <i class="fa fa-star-o"></i>
                  </div>
                </div>
                <div class="mail-list new_mail">
                  <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> </label></div>
                  <div class="content">
                    <p class="sender-name">Microsoft Account Password Change</p>
                    <p class="message_text">Change the password for your Microsoft Account using the security code 35525</p>
                  </div>
                  <div class="details">
                    <i class="fa fa-star-o"></i>
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
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
</html>
