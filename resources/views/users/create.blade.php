<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Create</title>

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
                        <h3>New User</h3>
                        <p class="text-subtitle text-muted">Add new user.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
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

                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- First Name -->
    <div class="mb-3 row">
        <label for="fname" class="col-md-4 col-form-label text-md-end text-start">First Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}">
            @error('fname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Last Name -->
    <div class="mb-3 row">
        <label for="lname" class="col-md-4 col-form-label text-md-end text-start">Last Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}">
            @error('lname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Gender -->
    <div class="mb-3 row">
        <label for="gender" class="col-md-4 col-form-label text-md-end text-start">Gender</label>
        <div class="col-md-6">
            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option value="male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Birthdate -->
    <div class="mb-3 row">
        <label for="birthdate" class="col-md-4 col-form-label text-md-end text-start">Birthdate</label>
        <div class="col-md-6">
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
            @error('birthdate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Relationship -->
    <div class="mb-3 row">
        <label for="relationship" class="col-md-4 col-form-label text-md-end text-start">Relationship</label>
        <div class="col-md-6">
            <select class="form-select @error('relationship') is-invalid @enderror" id="relationship" name="relationship">
                <option value="single" {{ old('relationship') == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('relationship') == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="widow" {{ old('relationship') == 'Widow' ? 'selected' : '' }}>Widow</option>
            </select>
            @error('relationship')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Address -->
    <div class="mb-3 row">
        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
        <div class="col-md-6">
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Description -->
    <div class="mb-3 row">
        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
        <div class="col-md-6">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Email Address (Already Exists) -->
    <div class="mb-3 row">
        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Password -->
    <div class="mb-3 row">
        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Confirm Password -->
    <div class="mb-3 row">
        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
    </div>

    <!-- Roles -->
    <div class="mb-3 row">
        <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
        <div class="col-md-6">
            @forelse ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="roles" id="role_{{ $loop->index }}" value="{{ $role }}" {{ old('roles') == $role ? 'checked' : '' }}>
                    <label class="form-check-label" for="role_{{ $loop->index }}">
                        {{ $role }}
                    </label>
                </div>
            @empty
                No roles found.
            @endforelse
            @error('roles')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Photo -->
    <div class="mb-3 row">
        <label for="photo" class="col-md-4 col-form-label text-md-end text-start">Profile Photo</label>
        <div class="col-md-6">
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Thumbnail -->
    <div class="mb-3 row">
        <label for="thumbnail" class="col-md-4 col-form-label text-md-end text-start">Thumbnail</label>
        <div class="col-md-6">
            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
            @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mb-3 row">
        <input type="submit" class="col-md-3 offset-md-4 btn btn-primary" value="Add User">
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
