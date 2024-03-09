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
              To Do list
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">To Do list</li>
              </ol>
            </nav>
          </div>
          <div class="row">
						<div class="col-lg-12">
							<div class="card px-3">
								<div class="card-body">
									<h4 class="card-title">Track your tasks!</h4>
									
                                    <form action="{{ route('toDos.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="title">Task Title</label>
                                                    <input type="text" id="title" name="title" class="form-control todo-list-input" placeholder="What do you need to do today?">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Task Description</label>
                                                    <input id="description" name="description" class="form-control todo-list-input" placeholder="Provide further description of the task.">
                                                </div>
                                            </div>
                                            <div class="col-md-1 align-self-end">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mr-2">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


									<div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        @foreach($toDos as $toDo)
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" data-task-id="{{ $toDo->id }}" {{ $toDo->status === 'completed' ? 'checked' : '' }}>
                                                        {{ $toDo->title }}
                                                    </label>
                                                </div>
                                                <i class="remove fa fa-times-circle"></i>

                                            </li>
                                        @endforeach
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
  <script src="<?php echo url('melody')?>/js/calendar.js"></script>
  <!-- End custom js for this page-->

</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/todo.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:25 GMT -->
</html>
