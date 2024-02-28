<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blogs | Edit</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo url('melody') ?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo url('melody') ?>/images/favicon.png" />

    <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 300,
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
            <!-- main panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Edit Blog</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Culture</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Blog</h4>
                                    <p class="card-description">Update details of the blog.</p>
                                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" id="title" class="form-control" aria-describedby="Text help" name="title" value="{{ $blog->title }}"></input>
                                        </div>

                                        <!-- Culture -->
                                        <div class="form-group">
                                            <label>Culture</label>
                                            <textarea type="text" id="culture" class="form-control" aria-describedby="Text help" name="culture" >{{ $blog->culture }}</textarea>
                                        </div>

                                        <!-- People -->
                                        <div class="form-group">
                                            <label>People</label>
                                            <textarea type="text" id="people" class="form-control" aria-describedby="Text help" name="people" >{{ $blog->people }}</textarea>
                                        </div>

                                        <!-- Language -->
                                        <div class="form-group">
                                            <label>Language</label>
                                            <textarea type="text" id="language" class="form-control" aria-describedby="Text help" name="language" >{{ $blog->language }}</textarea>
                                        </div>

                                        <!-- Food and Drink -->
                                        <div class="form-group">
                                            <label>Food and Drink</label>
                                            <textarea type="text" id="food_drink" class="form-control" aria-describedby="Text help" name="food_drink" >{{ $blog->food_drink }}</textarea>
                                        </div>

                                        <!-- Music -->
                                        <div class="form-group">
                                            <label>Music</label>
                                            <textarea type="text" id="music" class="form-control" aria-describedby="Text help" name="music" >{{ $blog->music }}</textarea>
                                        </div>

                                        <!-- Arts and Crafts -->
                                        <div class="form-group">
                                            <label>Arts and Crafts</label>
                                            <textarea type="text" id="arts" class="form-control" aria-describedby="Text help" name="arts" >{{ $blog->arts }}</textarea>
                                        </div>

                                        <!-- Location -->
                                        <div class="form-group">
                                            <label>Location</label>
                                            <textarea type="text" id="location" class="form-control" aria-describedby="Text help" name="location" >{{ $blog->location }}</textarea>
                                        </div>

                                        <!-- Religion -->
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <textarea type="text" id="religion" class="form-control" aria-describedby="Text help" name="religion" >{{ $blog->religion }}</textarea>
                                        </div>

                                        <!-- Politics -->
                                        <div class="form-group">
                                            <label>Politics</label>
                                            <textarea type="text" id="politics" class="form-control" aria-describedby="Text help" name="politics" >{{ $blog->politics }}</textarea>
                                        </div>

                                        <!-- Events -->
                                        <div class="form-group">
                                            <label>Events</label>
                                            <textarea type="text" id="events" class="form-control" aria-describedby="Text help" name="events" >{{ $blog->events }}</textarea>
                                        </div>

                                        <!-- History -->
                                        <div class="form-group">
                                            <label>History</label>
                                            <textarea type="text" id="history" class="form-control" aria-describedby="Text help" name="history" >{{ $blog->history }}</textarea>
                                        </div>


                                        <div class="row">
                                            <div class="col-10">
                                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                <a href="{{ route('blogs.index') }}" class="btn btn-light">Cancel</a>
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

</body>

</html>
