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
                        <h3>New Role</h3>
                        <p class="text-subtitle text-muted">Add new role.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                <div class="col-md-6">
                                    <div class="overflow-auto" style="max-height: 200px;">
                                        @forelse ($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" name="permissions[]" {{ in_array($permission->id, old('permissions') ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @empty
                                            No permissions available.
                                        @endforelse
                                    </div>
                                    @if ($errors->has('permissions'))
                                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Role">
                            </div>
                        </form>
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
