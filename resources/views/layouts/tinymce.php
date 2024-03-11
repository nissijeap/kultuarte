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
    <link rel="stylesheet" href="<?php echo url('assets') ?>/css/themify-icons.css"href="{{ asset('assets/css/feather.css') }}">
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
<div id="app">
        <main>
             @yield('content')
        </main>
    </div>
    <!-- Post -->
    <script src="<?php echo url('assets') ?>/js/post.js" type="text/javascript"></script>
    <script src="<?php echo url('assets') ?>/js/home.js" type="text/javascript"></script>
    <script src="<?php echo url('assets') ?>/js/blog.js" type="text/javascript"></script>

    <script src="<?php echo url('assets') ?>/js/lightbox.js"></script>
    <script src="<?php echo url('assets') ?>/js/scripts.js"></script>
</body>
</html>
