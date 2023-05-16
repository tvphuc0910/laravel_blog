@extends('layout')

@section('header')
<div class="section section-header-blog">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('{{asset('storage/'. $post->photo)}}')">
        </div>
        <div class="container">
            <div class="content">
                <a href="{{ route('category.show', $post->category->slug) }}" class="btn btn-fill btn-info">{{$post->category->name}}</a>
                <h1>{{$post->title}}</h1>
                <div class="separator separator-danger">✻</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="table-of-contents">
                    <h4>TABLE OF CONTENTS</h4>
                    <div class="toc"></div>
                </div>
                <div class="content-blog">
                    {!!$post->content!!}
                </div>
            </div>
        </div>
    </div>
</div>
Suggested Posts by category
<br>
@foreach($suggestedPosts as $suggestedPost)
    <div class="card card-plain card-blog">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('blog.show', $suggestedPost)}}" class="header">
                    <img src="{{asset('storage/'. $suggestedPost->photo)}}">
                </a>
            </div>
            <div class="col-sm-5 col-md-offset-1">
                <div class="content">
                    <a href="{{route('category.show', $suggestedPost->category->slug)}}"  class="btn btn-simple btn-info">
                        {{ $suggestedPost->category->name }}
                    </a>
                    <a href="{{route('blog.show', $suggestedPost)}}" class="card-title">
                        <h2>{{$suggestedPost->title}}</h2>
                    </a>

                    <p class="text-gray">{{$suggestedPost->description}}</p>


                    <a href="{{route('blog.show', $suggestedPost)}}" class="btn btn-danger btn-fill">Read More</a>

                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection


