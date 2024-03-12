<!DOCTYPE html>
<html lang="en">

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
        <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/iconfonts/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="<?php echo url('melody') ?>/vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?php echo url('melody') ?>/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?php echo url('melody') ?>/images/favicon.png" />

        <!-- Sweetalert -->
        <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" type="text/css"></link>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

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
                // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss fullscreen', 
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

    <body class="sidebar-icon-only sidebar-dark">
        <div class="container-scroller">
            @include('superadmin.layouts.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('superadmin.layouts.settings')
                @include('superadmin.layouts.sidebar')
                <!-- main panel -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">Create Blog</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Culture</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Create New Blog</h4>
                                        <p class="card-description">Enter details to create a new blog.</p>
                                        <div class="card-body p-0 mt-3 mb-3 position-relative" style="border: 1px gray !important; border-radius:15px !important; background: white !important;">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" id="title" class="form-control" aria-describedby="Text help" name="title"  placeholder="What's the title of the blog?" required></input>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label>Categories</label>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" id="people" name="categories" value="1">
                                                    <label for="people" class="me-5">&nbsp;&nbsp;People</label>
                                                    <input type="checkbox" id="language" name="categories" value="2">
                                                    <label for="language" class="me-5">&nbsp;&nbsp;Language</label>
                                                    <input type="checkbox" id="food_drink" name="categories" value="3">
                                                    <label for="food_drink" class="me-5">&nbsp;&nbsp;Food & Drink</label>
                                                    <input type="checkbox" id="music_dances" name="categories" value="4">
                                                    <label for="music_dances" class="me-5">&nbsp;&nbsp;Music & Dances</label>
                                                    <input type="checkbox" id="arts_crafts" name="categories" value="5">
                                                    <label for="arts_crafts" class="me-5">&nbsp&nbsp;Arts & Crafts</label>
                                                    <input type="checkbox" id="location" name="categories" value="6">
                                                    <label for="location" class="me-5">&nbsp;&nbsp;Location</label>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" id="religion" name="categories" value="7">
                                                    <label for="religion" class="me-5">&nbsp;&nbsp;Religion</label>
                                                    <input type="checkbox" id="politics" name="categories" value="8">
                                                    <label for="politics" class="me-5">&nbsp;&nbsp;Politics</label>
                                                    <input type="checkbox" id="events" name="categories" value="9">
                                                    <label for="events" class="me-5">&nbsp;&nbsp;Events</label>
                                                    <input type="checkbox" id="history" name="categories" value="10">
                                                    <label for="history" class="me-5">&nbsp;&nbsp;History</label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label>Ethnic Group</label>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <input type="radio" id="maranao" name="ethnicity" value="1">
                                                    <label for="maranao" class="me-5">&nbsp;&nbsp;Maranao</label>
                                                    <input type="radio" id="tausug" name="ethnicity" value="2">
                                                    <label for="tausug" class="me-5">&nbsp;&nbsp;Tausug</label>
                                                    <input type="radio" id="higaonon" name="ethnicity" value="3">
                                                    <label for="higaonon" class="me-5">&nbsp;&nbsp;Higaonon</label>
                                                    <input type="radio" id="migrants" name="ethnicity" value="4">
                                                    <label for="migrants" class="me-5">&nbsp;&nbsp;Migrants</label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="people-form">
                                                <label>People</label>
                                                <textarea type="text" id="people" class="form-control" aria-describedby="Text help" name="people"  placeholder="People Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="language-form">
                                                <label>Language</label>
                                                <textarea type="text" id="language" class="form-control" aria-describedby="Text help" name="language"  placeholder="Language Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="food_drink-form">
                                                <label>Food & Drink</label>
                                                <textarea type="text" id="food_drink" class="form-control" aria-describedby="Text help" name="food_drink"  placeholder="Food & Drink Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="music_dances-form">
                                                <label>Music & Dances</label>
                                                <textarea type="text" id="music_dances" class="form-control" aria-describedby="Text help" name="music_dances"  placeholder="Music & Dances Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="arts_crafts-form">
                                                <label>Arts & Crafts</label>
                                                <textarea type="text" id="arts_crafts" class="form-control" aria-describedby="Text help" name="arts_crafts"  placeholder="Arts & Crafts Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="location-form">
                                                <label>Location</label>
                                                <textarea type="text" id="location" class="form-control" aria-describedby="Text help" name="location"  placeholder="Location Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="religion-form">
                                                <label>Religion</label>
                                                <textarea type="text" id="religion" class="form-control" aria-describedby="Text help" name="religion"  placeholder="Religion Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="politics-form">
                                                <label>Politics</label>
                                                <textarea type="text" id="politics" class="form-control" aria-describedby="Text help" name="politics"  placeholder="Politics Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="events-form">
                                                <label>Events</label>
                                                <textarea type="text" id="events" class="form-control" aria-describedby="Text help" name="events"  placeholder="Events Information" ></textarea>
                                            </div>

                                            <div class="form-group mt-3 d-none" id="history-form">
                                                <label>History</label>
                                                <textarea type="text" id="history" class="form-control" aria-describedby="Text help" name="history"  placeholder="History Information" ></textarea>
                                            </div>

                                        </div>

                                        <div class="card-body d-flex p-0 mt-0">
                                            <button id="shareButton" type="button" class="ms-auto p-2 lh-20 w100 me-2 text-center font-xss fw-600 ls-1 rounded-xl" style="border:none; background-color: #e15600; color: white;" onclick="storeBlog()">SHARE</button>
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
        <script src="{{ asset('assets/js/blog.js') }}"></script>
        <script src="<?php echo url('melody') ?>/js/file-upload.js"></script>
        <script src="<?php echo url('melody') ?>/js/typeahead.js"></script>
        <script src="<?php echo url('melody') ?>/js/select2.js"></script>
        <!-- End custom js for this page-->
        <script>
            var blogStore= "{{ route('storeBlog') }}";
        </script>

    </body>

</html>