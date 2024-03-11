<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:25 GMT -->
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
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/lightgallery/css/lightgallery.css">
  <!--  plugin css for this page -->
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
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Gallery
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.gallery') }}">Media</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
              </ol>
            </nav>
          </div>
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
              <div class="card-body" style="max-height: 700px; overflow-y: auto;">
                    <h4 class="card-title">Photo Gallery</h4>
                    <p class="card-text">
                        Click on any image to open in lightbox gallery.
                    </p>
                    <div id="lightgallery" class="row lightGallery">
                        @forelse($medias as $media)
                            @php
                                $extension = pathinfo($media->media, PATHINFO_EXTENSION);
                            @endphp

                            @if($extension !== 'mp4')
                                <a href="{{ asset('medias/' . $media->media) }}" class="image-tile">
                                    <img src="{{ asset('medias/' . $media->media) }}" alt="image small" style="max-width: auto; height: 200px; object-fit: cover;">
                                </a>
                            @endif
                        @empty
                            No photos uploaded yet.
                        @endforelse
                    </div>
                </div>

              </div>
            </div>
          </div>
          
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
              <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <h4 class="card-title">Video Gallery</h4>
                    <p class="card-text">
                        Click on any video to play the file.
                  </p>
                  <div class="row lightGallery">
                    @forelse($medias as $media)
                        @php
                            $extension = pathinfo($media->media, PATHINFO_EXTENSION);
                        @endphp

                        @if($extension === 'mp4')
                            <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#" data-src="{{ asset('medias/' . $media->media) }}" data-toggle="modal" data-target="#videoModal">
                                <video controls style="max-width: 320px; height: auto; object-fit: cover;">
                                    <source src="{{ asset('medias/' . $media->media) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </a>
                        @endif
                    @empty
                        No videos uploaded yet.
                    @endforelse
                </div>

                <!-- Modal -->
                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <video id="modalVideo" controls autoplay style="width: 100%;">
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
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
  <!-- plugin js for this page -->
  <script src="<?php echo url('melody')?>/vendors/lightgallery/js/lightgallery-all.min.js"></script>
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo url('melody')?>/js/off-canvas.js"></script>
  <script src="<?php echo url('melody')?>/js/hoverable-collapse.js"></script>
  <script src="<?php echo url('melody')?>/js/misc.js"></script>
  <script src="<?php echo url('melody')?>/js/settings.js"></script>
  <script src="<?php echo url('melody')?>/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo url('melody')?>/js/light-gallery.js"></script>
  <!-- End custom js for this page-->

  <script>
    $(document).ready(function() {
        $('#videoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var videoSrc = button.data('src'); // Extract video source from data-src attribute

            var modal = $(this);
            modal.find('#modalVideo').attr('src', videoSrc); // Set the video source for the modal video
        });

        // Pause the video when modal is closed
        $('#videoModal').on('hidden.bs.modal', function(event) {
            var modal = $(this);
            modal.find('#modalVideo').get(0).pause(); // Pause the video
        });
    });
</script>

</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:10:25 GMT -->
</html>
