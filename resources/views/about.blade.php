@extends('layout')

@section('header')
<div class="section section-header section-header-about">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('{{asset('img/header-12.jpeg')}}')">
        </div>
        <div class="container">
            <div class="content">
                <h1>About Our Company</h1>
                <h3 class="subtitle">How We Started the Journey.</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="section">
    <div class="text-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title-area">
                        <h5 class="subtitle text-gray">Est. 2013</h5>
                        <h2>Who we are section</h2>
                        <div class="separator separator-danger">✻</div>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1">
                    <div class="description">
                        <p>That dreams will actualize. Dreams will manifest. I stand with the utmost humility. We are so blessed! All praises and blessings to the families of people who never gave up on dreams I speak truth to power!</p>
                        <p>We can't wait to work with you because you will love to work with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="card card-plain">
                                <img alt="..." src="{{asset('img/office-1.jpeg')}}" />
                            </div>
                            <div class="card card-plain">
                                <img alt="..." src="{{asset('img/office-3.jpeg')}}" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <img alt="..." src="{{asset('img/office-3.jpeg')}}" />
                            </div>
                            <div class="card card-plain">
                                <img alt="..." src="{{asset('img/office-4.jpeg')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="title-area">
                <h2>Our Services</h2>
                <div class="separator separator-danger">✻</div>
                <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-car"></i>
                    </div>
                    <h3>Delivery</h3>
                    <p class="description">We sketch your wardrobe down to the last detail and present it to you.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-graph1"></i>
                    </div>
                    <h3>Sales</h3>
                    <p class="description">We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-note2"></i>
                    </div>
                    <h3>Content</h3>
                    <p class="description">We create a persona regarding the multiple wardrobe accessories that we provide..</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="info-icon">
                    <div class="icon text-danger">
                        <i class="pe-7s-music"></i>
                    </div>
                    <h3>Music</h3>
                    <p class="description">We like to present the world with our work, so we make sure we spread the word regarding our clothes.</p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
