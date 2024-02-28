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

  <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
        },
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss fullscreen', // Add 'fullscreen' plugin here
        toolbar: 'undo redo | fullscreen | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),  
        media_live_embeds: true,
        audio_template_callback: function(data) {
        return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
        },
        media_url_resolver: function (data, resolve/*, reject*/) {
            if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
            var embedHtml = '<iframe src="' + data.url +
            '" width="400" height="400" ></iframe>';
            resolve({html: embedHtml});
            } else {
            resolve({html: ''});
            }
        },
        video_template_callback: function(data) {
        return '<video width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
        },
        image_title: true,
        automatic_uploads: true,
        images_uplaod_url: '/upload',
        file_picker_types: 'image media file', 
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*,audio/*,video/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        }
    });
</script>

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
                        <form action="{{ route('emails.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="send_name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="send_email" value="{{ Auth::user()->email }}">

                            <div class="form-group">
                                <label for="rcpt_email" class="form-label">To</label>
                                <input type="email" class="form-control" id="rcpt_email" name="rcpt_email" placeholder="Enter recipient email" required>
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject" required>
                            </div>

                            <div class="form-group">
                                <label for="message" class="form-label">Message</label>
                                <textarea type="text" class="form-control" id="message" name="message" aria-describedby="Text help" placeholder="What's your concern?" required></textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                        <br>
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
