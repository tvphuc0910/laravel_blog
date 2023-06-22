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

<div class="section section-signin">

    <div class="image-container">
        <div class="filter filter-color-black" style="background-image: url('{{asset('img/header-9.jpeg')}}')">
            <div class="col-md-8 col-md-offset-1">
                <div class="content">
                    <div class="title-area">
                        <h1 class="title-modern">Gaia</h1>
                        <h3>Premium Bootstrap Template</h3>
                    </div>

                    <h5 class="subtitle">First Feature</h5>
                    <p>Ultralight Prayer: Happy Easter! In Roman times the artist would contemplate proportions and
                        colors. Now there is only one important color...
                    </p>
                    <h5 class="subtitle">Second Feature</h5>
                    <p>We no longer have to be scared of the truth I promise I will never let the people down. I want a
                        better life for all!
                    </p>
                    <h5 class="subtitle">Third Feature</h5>
                    <p>WI have a dream. That dreams will actualize. Dreams will manifest. When companies doubt me they
                        doubt us.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-container">
        <form method="post" action="{{route('process_login')}}">
            @csrf
            <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-center">
                <div class="title-area">
                    <h2>Welcome</h2>
                    <div class="separator separator-danger">✻</div>
                </div>

                <label><h4 class="text-gray">Your email</h4></label>
                <div class="form-group">
                    <input type="email" name="email" placeholder="MichaelJordan@gmail.com"
                           class="form-control form-control-plain">
                </div>

                <label><h4 class="text-gray">Your password</h4></label>
                <div class="form-group">
                    <input type="password" name="password" placeholder="&#x25CF;&#x25CF;&#x25CF;&#x25CF;"
                           class="form-control form-control-plain">
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="footer">
                    <button class="btn btn-danger btn-round btn-fill btn-wd">
                        Sign In
                    </button>
                    <p class="text-gray info">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

<!--   core js files    -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{asset('js/gaia.js')}}"></script>

</html>
