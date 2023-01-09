@extends('layout')

@section('header')
<div class="section section-header-blog">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('{{asset('img/header-10.jpeg')}}')">
        </div>
        <div class="container">
            <div class="content">
                <div class="title-area">
                    <h1>Creative Blog</h1>
                    <h3>Find only the best stories from our famous writers.</h3>
                    <button type="button" class="btn btn-white btn-fill">Discover Stories</button>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('content')


<div class="section section-blog-horizontal">
    <div class="container">
        <div class="title">
            <h5 class="text-gray">Checkout our Latest</h5>
            <h2>Blog Posts</h2>
            <div class="separator separator-danger">✻</div>
        </div>

    @foreach($posts as $post)
        <div class="card card-plain card-blog">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('blog.show', $post)}}" class="header">
                        <img src="{{asset('storage/'. $post->photo)}}">
                    </a>
                </div>
                <div class="col-sm-5 col-md-offset-1">
                    <div class="content">
                        <h5 class="card-category text-info">
                            {{ $post->category->name }}
                        </h5>
                        <a href="{{route('blog.show', $post)}}" class="card-title">
                            <h2>{{$post->title}}</h2>
                        </a>

                        <p class="text-gray">{{$post->description}}</p>


                        <a href="{{route('blog.show', $post)}}" class="btn btn-danger btn-fill">Read More</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>


<div class="section section-contact">
    <div class="container">
        <div class="text-area">
            <div class="title">
                <h2>Subscribe to Newsletter</h2>
                <div class="separator separator-danger">✻</div>
                <h5 class="text-gray">We are so blessed! All praises and blessings to the families of people who never gave up on dreams I love you guys.</h5>
            </div>

            <div class="contact-form">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 col-md-push-4">
                            <div class="form-group">
                                <input type="text" name="email" value="" placeholder="michael.j@gmail.com" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-fill btn-danger">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection
