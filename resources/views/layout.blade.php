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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="">Blog post</a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">Blog Posts</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="{{route('about')}}">About us</a>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact us</a>
                        </li>
                        <li>
                            <a href="portfolio.html">Portfolio</a>
                        </li>
                        <li>
                            <a href="signin.html">Signin</a>
                        </li>
                        <li>
                            <a href="signup.html">Signup</a>
                        </li>
                        <li>
                            <a href="../documentation/components.html">All components</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pricing.html">Pricing</a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/product/gaia-bootstrap-template-pro" class="btn btn-danger btn-fill">Buy now</a>
                </li>
                <li class="dropdown">
                    <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-share-alt"></i> Share
                    </a>
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>


@yield('header')

@yield('content')

<footer class="footer footer-big footer-color-black" data-color="black">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="info">
                    <h5 class="title">Company</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">Home</a></li>
                            <li>
                                <a href="#">Find offers</a>
                            </li>
                            <li>
                                <a href="#">Discover Projects</a>
                            </li>
                            <li>
                                <a href="#">Our Portfolio</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-3">
                <div class="info">
                    <h5 class="title"> Help and Support</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">How it works</a>
                            </li>
                            <li>
                                <a href="#">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="#">Company Policy</a>
                            </li>
                            <li>
                                <a href="#">Money Back</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="info">
                    <h5 class="title">Latest News</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i> <b>Get Shit Done</b> The best kit in the market is here, just give it a try and let us...
                                    <hr class="hr-small">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i> We've just been featured on <b> Awwwards Website</b>! Thank you everybody for...
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-1 col-sm-3">
                <div class="info">
                    <h5 class="title">Follow us on</h5>
                    <nav>
                        <ul>
                            <li>
                                <a href="#" class="btn btn-social btn-facebook btn-simple">
                                    <i class="fa fa-facebook-square"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                    <i class="fa fa-dribbble"></i> Dribbble
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-twitter btn-simple">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-social btn-reddit btn-simple">
                                    <i class="fa fa-google-plus-square"></i> Google+
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright">
            © <script> document.write(new Date().getFullYear()) </script> Creative Tim, made with love
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
