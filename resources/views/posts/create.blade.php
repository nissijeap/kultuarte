<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posts | Create</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('melody/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('melody/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('melody/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('melody/images/favicon.png') }}" />
    <!-- Add this in your HTML head section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

</head>

<body class="sidebar-icon-only">
    <div class="container-scroller">
        <!-- Include navbar and sidebar -->
        @include('superadmin.layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- Include settings and sidebar -->
            @include('superadmin.layouts.settings')
            @include('superadmin.layouts.sidebar')
            <!-- main panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Create Post</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create New Post</h4>
                                    <p class="card-description">Enter details to create a new post.</p>
                                    <div class="card-body p-0 mt-3 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                                    <textarea name="content" id="content" class="form-control" rows="10" placeholder="What's on your mind?" required></textarea><br>
                                        <form id="dropzoneForm" class="dropzone" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" id="shareButton" onclick="storePost()" class="btn btn-primary mr-2">Submit</button>
                                            <a href="{{ route('posts.index') }}" class="btn btn-light">Cancel</a>
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
    <script src="{{ asset('melody/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('melody/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('melody/js/off-canvas.js') }}"></script>
    <script src="{{ asset('melody/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('melody/js/misc.js') }}"></script>
    <script src="{{ asset('melody/js/settings.js') }}"></script>
    <script src="{{ asset('melody/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('melody/js/file-upload.js') }}"></script>
    <script src="{{ asset('melody/js/typeahead.js') }}"></script>
    <script src="{{ asset('melody/js/select2.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <script>
        var store = "{{ route('posts.store') }}";
    </script>

    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $("#dropzoneForm").dropzone({
                url: "{{ route('posts.store') }}",
                paramName: "file",
                maxFilesize: 2,
                acceptedFiles: 'image/*, video/*',
                addRemoveLinks: true,
                dictRemoveFile: 'Remove',
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    console.log(response);
                }
            });
        });

        function storePost() {
            // You may add your own logic for storing posts here if needed
            // For now, this function just submits the form
            document.getElementById("dropzoneForm").submit();
        }
    </script>
</body>

</html>
