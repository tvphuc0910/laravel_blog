@extends('layout')

@section('header')
    <div class="section section-header-blog">
        <div class="parallax filter filter-color-black">
            <div class="image"
                 style="background-image:url('{{asset('storage/'. $post->photo)}}')">
            </div>
            <div class="container">
                <div class="content">
                    <a href="{{ route('category.show', $post->category->slug) }}"
                       class="btn btn-fill btn-info">{{$post->category->name}}</a>
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
            <div class="separator separator-danger">✻</div>
            <br>
            <a class="text-danger like-button" href="/like/{{ $post->id }}">
                <i class="fa fa-heart"></i>
                {{ $like }} Like
            </a>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Comments</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="media-area">
                        @foreach($comments as $comment)
                            <div class="media">
                                <a href="#" class="avatar avatar-danger pull-left">
                                    <img class="media-object" src="../assets/img/faces/face_1.jpg">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading">{{ $comment->user->name }}</h3>
                                    <h5 class="text-muted pull-right">{{ $comment->created_at->toDateTimeString() }}</h5>
                                    <p>
                                        {{ $comment->content }}
                                    </p>
                                    <div class="media-footer">
                                        @if(session('id') == $comment->id_user)
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-simple pull-right">
                                                    delete
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-danger btn-simple pull-right" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{$comment->id}}">
                                                edit
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter{{$comment->id}}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="title-modern text-center"
                                                                id="exampleModalLongTitle">Edit comment</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('comments.update', $comment) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="{{ $comment->id_post }}" name="id_post">
                                                                <input type="hidden" value="{{ $comment->id_user }}" name="id_user">
                                                                <textarea name="content" class="form-control"
                                                                          rows="6">{{ $comment->content }}</textarea>
                                                                <button class="btn btn-fill btn-success">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="contact-form">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_post" value="{{ $post->id }}">
                        <input type="hidden" name="id_user" value="{{ session('id') }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea name="content" class="form-control"
                                              placeholder="Here you can write your nice text" rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger btn-fill pull-right">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        $(".like-button").click(function (e) {
            e.preventDefault();// you dont want your anchor to redirect so prevent it
            $.ajax({
                type: "GET",
                // blade.php already loaded with contents we need, so we just need to
                // select the anchor attribute href with js.
                url: $('.like-button').attr('href'),
                success: function () {
                    location.reload();
                }
            })
        });
    </script>
@endsection


