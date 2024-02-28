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

              <div class="mail-view d-none d-md-block col-md-10 col-lg-10 border-left bg-white">
                <div class="row">
                  <div class="col-md-12 mb-4 mt-4">
                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text"><i class="fas fa-reply text-primary btn-icon-prepend"></i> Reply</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text"><i class="fas fa-reply-all text-primary btn-icon-prepend"></i>Reply All</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text"><i class="fa fa-share text-primary btn-icon-prepend"></i>Forward</button>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text"><i class="fa fa-paperclip text-primary btn-icon-prepend"></i>Attach</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text"><i class="fas fa-trash text-primary btn-icon-prepend"></i>Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="message-body">
                  <div class="sender-details">
                    <img class="img-sm rounded-circle mr-3" src="<?php echo url('melody')?>/images/faces/face11.html" alt="">
                    <div class="details">
                      <p class="msg-subject">
                        Weekly Update - Week 19 (May 8, 2017 - May 14, 2017)
                      </p>
                      <p class="sender-email">
                        Sarah Graves
                        <a href="#">itsmesarah268@gmail.com</a>
                      </p>
                    </div>
                  </div>
                  <div class="message-content">
                    <p>Hi Emily,</p>
                    <p>This week has been a great week and the team is right on schedule with the set deadline. The team has made great progress and achievements this week. At the current rate we will be able to deliver the product right on time and meet the quality that is expected of us. Attached are the seminar report held this week by our team and the final product design that needs your approval at the earliest.</p>
                    <p>For the coming week the highest priority is given to the development for <a href="http://www.urbanui.com/" target="_blank">http://www.urbanui.com/</a> once the design is approved and necessary improvements are made.</p>
                    <p><br><br>Regards,<br>Sarah Graves</p>
                  </div>
                  <div class="attachments-sections">
                    <ul>
                      <li>
                        <div class="thumb"><i class="fa fa-file-pdf"></i></div>
                        <div class="details">
                          <p class="file-name">Seminar Reports.pdf</p>
                          <div class="buttons">
                            <p class="file-size">678Kb</p>
                            <a href="#" class="view">View</a>
                            <a href="#" class="download">Download</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="thumb"><i class="fa fa-file-image"></i></div>
                        <div class="details">
                          <p class="file-name">Product Design.jpg</p>
                          <div class="buttons">
                            <p class="file-size">1.96Mb</p>
                            <a href="#" class="view">View</a>
                            <a href="#" class="download">Download</a>
                          </div>
                        </div>
                      </li>
                    </ul>
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
