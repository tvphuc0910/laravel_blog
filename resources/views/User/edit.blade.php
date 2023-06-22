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
    <form action="{{ route('user.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        <br>
        <div class="form-group">
            <label>Name</label>
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                @if($errors->has('name'))
                    <span class="text-danger">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <label>Email</label>
            <div class="form-group">
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                @if($errors->has('email'))
                    <span class="text-danger">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <label>Password</label>
            <div class="form-group">
                <input type="text" name="password" class="form-control" value="">
                @if($errors->has('password'))
                    <span class="text-danger">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <label>Password confirm</label>
            <div class="form-group">
                <input type="text" name="password_confirmation" class="form-control" value="">
                @if($errors->has('password_confirmation'))
                    <span class="text-danger">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                @endif
            </div>
        </div>
        <button class="btn btn-fill btn-success">Update</button>
        <br>
    </form>
@endsection
