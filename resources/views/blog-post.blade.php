@extends('layout')

@section('header')
<div class="section section-header-blog">
    <div class="parallax filter filter-color-black">
        <div class="image"
             style="background-image:url('{{asset('storage/'. $post->photo)}}')">
        </div>
        <div class="container">
            <div class="content">
                <button class="btn btn-fill btn-danger">{{$post->category->name}}</button>
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


@endsection


