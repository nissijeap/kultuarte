<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:40 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Permissions | List</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body class="sidebar-icon-only">

  <div class="container-scroller">
  @include('superadmin.layouts.navbar')

    <div class="container-fluid page-body-wrapper">

    @include('superadmin.layouts.settings')

    @include('superadmin.layouts.sidebar')

    <!-- main panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Manage Permissions
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table List</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
            <div class="row mb-3">
                <div class="col-11">
                  <h4 class="card-title">Data table</h4>
                </div>
                <div class="col-1">
                @can('create-permission')
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                @endcan
                </div>
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($permissions as $index => $permission)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $permission->name }}</td>
                              <td>{{ $permission->created_at->format('M d, Y h:i A') }}</td>
                              <td>
                                  <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-warning" title="Edit">
                                      <i class="fas fa-pencil-alt"></i>
                                  </a>

                              <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline-block;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-outline-danger delete-btn" title="Delete" data-id="{{ $permission->id }}">
                                      <i class="fas fa-trash-alt"></i>
                                  </button>
                              </form>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="4">No permission found</td>
                          </tr>
                      @endforelse
                  </tbody>

                </table>

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
  <script src="<?php echo url('melody')?>/js/data-table.js"></script>
  <!-- End custom js for this page-->

  <script>
    // Add a click event listener to all delete buttons
    document.querySelectorAll('.delete-btn').forEach(item => {
        item.addEventListener('click', function() {
            // Extract the data-id attribute
            const permissionId = this.getAttribute('data-id');

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this permission!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    document.getElementById('delete-form-' + permissionId).submit();
                }
            });
        });
    });
</script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:41 GMT -->
</html>
