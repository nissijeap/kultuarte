
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KultuArte | Login</title>
    
@extends('layouts.auth')
@section('content')

</head>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

    <div class="row">
        <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url('<?php echo url('sociala')?>/images/login-bg.jpg');"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login your Account</h2>
                        <br>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input id="email" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-1">
                                <input id="password" type="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label font-xsss text-grey-500" for="remember">Remember Me</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                                @endif
                            </div>
                            <br>
                         
                        <div class="col-sm-12 p-0 text-left">
                            <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Don't have an account? <a href="{{ route('register') }}" class="fw-700 ms-1">Register</a></h6>
                        </div>

                        </form>

                        <!-- <div class="col-sm-12 p-0 text-center mt-2">
                            
                            <h6 class="mb-0 d-inline-block bg-white fw-500 font-xsss text-grey-500 mb-3">Or, Sign in with your social account </h6>
                            <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img src="<?php echo url('sociala')?>/images/icon-1.png" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in with Google</a></div>
                            <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img src="<?php echo url('sociala')?>/images/icon-3.png" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in with Facebook</a></div>
                        </div> -->
                    </div>
                </div> 
            </div>
        </div>
    </div>

    @endsection
</body>
</html>