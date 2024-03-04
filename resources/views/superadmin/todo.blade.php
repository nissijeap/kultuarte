<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/todo.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:25 GMT -->
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
      
      
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Todo list
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Todo list</li>
              </ol>
            </nav>
          </div>
          <div class="row">
						<div class="col-lg-12">
							<div class="card px-3">
								<div class="card-body">
									<h4 class="card-title">Todo list</h4>
									<div class="add-items d-flex">
										<input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
										<button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
									</div>
									<div class="list-wrapper">
										<ul class="d-flex flex-column-reverse todo-list">
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Meeting with Alisa
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
											<li class="completed">
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Call John
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Create invoice
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Print Statements
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
											<li class="completed">
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Prepare for presentation
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
											<li>
												<div class="form-check">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Pick up kids from school
													</label>
												</div>
												<i class="remove fa fa-times-circle"></i>
											</li>
										</ul>
									</div>
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


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/todo.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:25 GMT -->
</html>
