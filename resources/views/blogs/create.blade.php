<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KultuArte</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

    <link rel="stylesheet"  href="<?php echo url('assets') ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/emoji.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/sweetalert2.min.css" type="text/css"></link>
    <script src="<?php echo url('assets') ?>/js/sweetalert2.min.js"></script>

    <!-- Dropzone -->
    <script src="<?php echo url('assets') ?>/js/dropzone.js"></script>
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/dropzone.min.css" type="text/css"></link>    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        plugins: 'image media table wordcount',
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
        images_upload_url: '/upload',
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
<body>
        <div class="preloader"></div>

        
        <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

            <!-- main content -->
            <div class="main-content">
                
                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        @include('layouts.preloader')
                        <div class="row feed-body">
                            <div class="mb-4 post_container">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 ps-3 pt-3 pe-3 pb-1 mb-3 mt-5">
                                    <h3 style="font-weight:bold !important;">Share your culture</h3>
                                </div>

                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                    <div class="card-body p-0">
                                        <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight" style="color: #e15600 !important;"></i>Create Blog</a>
                                    </div>
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
            </div>
            <!-- main content -->

            <!-- right chat -->
            <div class="right-chat nav-wrap mt-2 right-scroll-bar">
                <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->

                </div>
            </div>

    <script src="{{ asset('assets/js/blog.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        var blogStore= "{{ route('storeBlog') }}";
    </script>
</body>
</html>