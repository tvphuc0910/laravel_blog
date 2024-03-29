<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon.png')}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Signin | Gaia - Bootstrap Template</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/gaia.css')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css/fonts/pe-icon-7-stroke.css')}}" rel="stylesheet">
</head>

<body>

<div class="section section-white section-signup">
    <div class="static-image">
        <div class="image"
             style="background-image: url('{{asset('img/header-4.jpeg')}}')">
        </div>
        <div class="container">
            <form method="post" action="{{ route('user_store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <h2 class="text-white">Sign up</h2>

                        <div class="separator separator-danger">✻</div>

                        <p class="description">No credit card required.</p>
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name"
                                   class="form-control form-control-plain">
                            @if($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                                   class="form-control form-control-plain">
                            @if($errors->has('email'))
                                <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div>
                            <input type="hidden" name="level" value="0">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" placeholder="Password"
                                   class="form-control form-control-plain">
                            @if($errors->has('password'))
                                <span class="text-danger">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" value="" placeholder="Confirm password"
                                   class="form-control form-control-plain">
                            @if($errors->has('password_confirmation'))
                                <span class="text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                        <p>
                            By signing up you agree to
                            <a href="signup.html">
                                <span class="text-danger">
                                    Terms of Service
                                </span>
                            </a> and
                            <a href="signup.html">
                                <span class="text-danger">
                                    Privacy Policy
                                </span>
                            </a>
                        </p>
                        <div class="button-signin">
                            <button class="btn btn-danger btn-round btn-fill btn-wd">
                                Sign Up
                            </button>
                        </div>
                        <p>
                            Or use an existing <a href="signin.html" class="text-danger">account</a>.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

<!--   core js files    -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="../assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="../assets/js/gaia.js"></script>

</html>
