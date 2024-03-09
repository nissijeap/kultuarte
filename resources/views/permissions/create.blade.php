<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Permissions | Create</title>
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
                        <h3 class="page-title">Create Permission</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create New Permission</h4>
                                    <p class="card-description">Enter details to create a new permission.</p>
                                    <form action="{{ route('permissions.store') }}" method="POST" class="forms-sample">
                                        @csrf
                                        <div id="permissionInputs">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control permissionInput" name="permissions[0][name]" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-10">
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <a href="{{ route('permissions.index') }}" class="btn btn-light">Cancel</a>
                                            </div>

                                            <div class="col-2">
                                                <button type="button" class="btn btn-success addPermissionInput"><i class="fa fa-plus-circle"></i> More Permission</button>
                                            </div>
                                        </div>
                                    </form>
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

<script>
    // Add permission input dynamically
    $(document).ready(function () {
        let permissionIndex = 1;

        $(".addPermissionInput").click(function () {
            var inputGroup = `
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control permissionInput" name="permissions[${permissionIndex}][name]" placeholder="Name" required>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-danger removePermissionInput">X</button>
                        </div>
                    </div>
                </div>`;
            $("#permissionInputs").append(inputGroup);
            permissionIndex++;
        });

        // Remove permission input
        $(document).on("click", ".removePermissionInput", function () {
            $(this).closest('.form-group').remove();
        });
    });
</script>
</body>

</html>
