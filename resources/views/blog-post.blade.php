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
        <a class="text-danger interactor" href="/like/{{ $post->id }}">{{ $like }} Like</a>
    </div>
</div>
<br>
<div class="section section-gray">
    <div class="container">
        <div class="title-area">
            <h5 class="subtitle text-gray">Don't miss our</h5>
            <h2>Most Recommended Stories</h2>
            <div class="separator separator-danger">✻</div>
        </div>
        <div class="row">
            @foreach($suggestedPosts as $suggestedPost)
                <div class="col-md-4">
                    <div class="card card-blog">
                        <a href="{{route('blog.show', $suggestedPost)}}" class="header">
                            <img src="{{asset('storage/'. $suggestedPost->photo)}}" class="image-header">
                        </a>
                        <div class="content">
                            <h6 class="card-date">{{ $suggestedPost->created_at->toFormattedDateString() }}</h6>
                            <a href="{{route('blog.show', $suggestedPost)}}" class="card-title">
                                <h3>{{$suggestedPost->title}}</h3>
                            </a>
                            <div class="line-divider line-danger"></div>
                            <h6 class="card-category">{{ $suggestedPost->category->name }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(".interactor").click(function(e){
            e.preventDefault();// you dont want your anchor to redirect so prevent it
            $.ajax({
                type: "GET",
                // blade.php already loaded with contents we need, so we just need to
                // select the anchor attribute href with js.
                url: $('.interactor').attr('href'),
                success: function() {
                    location.reload();
                }
            })
        });
    </script>
@endsection


