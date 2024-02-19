<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles | Create</title>

    <link rel="shortcut icon" href="<?php echo url('mazer')?>/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?php echo url('mazer')?>/dist/assets/compiled/css/app-dark.css">

</head>

<body>
    <div id="app">

    @include('superadmin.sidebar')

    <div id="main" class='layout-navbar navbar-fixed'>

    @include('superadmin.header')

    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $role->name }}</h3>
                        <p class="text-subtitle text-muted">Details of Roles.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>



                <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                                <div class="col-md-6" style="line-height: 35px;">
                                    {{ $role->name }}
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permissions:</strong></label>
                                <div class="col-md-6" style="line-height: 35px;">
                                    @if ($role->name=='Super Admin')
                                        <span class="badge bg-primary">All</span>
                                    @else
                                        @forelse ($rolePermissions as $permission)
                                            <span class="badge bg-primary">{{ $permission->name }}</span>
                                        @empty
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                            </div>

</div>
</div>    
</div>
</div>
</section>
<!-- // Basic multiple Column Form section end -->
</div>
</div>
</div>

</div>


<script src="<?php echo url('mazer')?>/dist/assets/static/js/components/dark.js"></script>
<script src="<?php echo url('mazer')?>/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo url('mazer')?>/dist/assets/compiled/js/app.js"></script>

@include('sweetalert::alert')

</body>
</html>
