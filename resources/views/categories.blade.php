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

            @foreach($categories as $category)
                <div class="card card-plain card-blog">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content">
                                <a href="{{route('category.show', $category->slug)}}" class="btn btn-simple btn-primary">
                                    <h1>
                                        {{$category->name}}
                                    </h1>
                                </a>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{route('blog.show', $category->latestPost)}}" class="header">
                                            <img src="{{asset('storage/'. $category->latestPost->photo)}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-5 col-md-offset-1">
                                        <div class="content">
                                            <a href="{{route('blog.show', $category->latestPost)}}" class="card-title">
                                                <h2>{{$category->latestPost->title}}</h2>
                                            </a>

                                            <p class="text-gray">{{$category->latestPost->description}}</p>


                                            <a href="{{route('blog.show', $category->latestPost)}}" class="btn btn-danger btn-fill">Read More</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="col-md-12 text-center">
        {{ $categories->links() }}
    </div>
    <br>


@endsection
