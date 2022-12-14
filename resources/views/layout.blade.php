<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Home | Gaia - Bootstrap Template</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/gaia.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
    <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="{{route('welcome.index')}}" class="navbar-brand">
                Gaia
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a href="{{route('welcome.index')}}">Home</a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li>
                    <a href="{{route('about')}}">About me</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>


@yield('header')

@yield('content')

<footer class="footer footer-color-black" data-color="black">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="{{route('welcome.index')}}">Home</a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li>
                    <a href="{{route('about')}}">About me</a>
                </li>
            </ul>
        </nav>
        <div class="social-area pull-right">
            <a class="btn btn-social btn-facebook btn-simple">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a class="btn btn-social btn-twitter btn-simple">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="btn btn-social btn-pinterest btn-simple">
                <i class="fa fa-pinterest"></i>
            </a>
        </div>
        <div class="copyright">
            &copy; <script>document.write(new Date().getFullYear())</script> Name
        </div>
    </div>
</footer>

</body>

<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('js/gaia.js') }}"></script>

</html>
