<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KultuArte | Register</title>
    
@extends('layouts.auth')
@section('content')

</head>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

    <div class="row">
        <div class="p-0 bg-no-repeat col-xl-5 d-none d-xl-block vh-100 bg-image-cover" style="background-image: url('<?php echo url('sociala')?>/images/login-bg-2.jpg');"></div>
            <div class="overflow-scroll bg-white col-xl-7 vh-100 align-items-center d-flex rounded-3">
                <div class="border-0 shadow-none card ms-auto me-auto login-card">
                    <div class="text-left card-body rounded-0">

                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                        @endforeach

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <h2 class="my-4 fw-700 display1-size display2-md-size">Create an Account</h2> <br>
                            @csrf

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input id="fname" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name" required autocomplete="fname" autofocus>
                                
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input id="lname" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required autocomplete="lname" autofocus>
                                
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-arrow-circle-down text-grey-500 pe-0"></i>
                                <select id="gender" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender">
                                    <option value="" disabled selected>Choose Gender</option>
                                    <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                    <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                </select>
                                
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-calendar text-grey-500 pe-0"></i>
                                <input id="birthdate" type="date" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" placeholder="Birthdate" required autocomplete="birthdate">
                                
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-image text-grey-500 pe-0"></i>
                                <input id="photo" type="file" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" name="photo" accept="image/*" placeholder="Profile Photo" autocomplete="photo">
                                
                                <!-- @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>


                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input id="email" type="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-3">
                                <input id="password" type="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-1">
                                <input id="password-confirm" type="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>

                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck2">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck2">Accept Term and Conditions</label>
                                <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                            </div> <br>

                            
                            <div class="col-sm-12 p-0 text-left">
                                <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have an account?<a href="{{ route('login')}}" class="fw-700 ms-1">Login</a></h6>
                            </div>

                        </form>
                         
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>

    @endsection

</body>
</html>