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
    <a href="{{ route('user.edit', $user->id) }}">
        Edit Profile
    </a>
    <ul class="list-group">
        <li class="list-group-item">Name: {{ $user->name }}</li>
        <li class="list-group-item">Email: {{ $user->email }}</li>
        <li class="list-group-item">Password: *****</li>
    </ul>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}">
        Delete
    </button>
    <form action="{{ route('user.destroy', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title " id="exampleModalLongTitle">Are you sure ?</h2>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">
                            Do you really want to delete this ?
                            This process cannot be undone !
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-fill btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
{{--    <form action="{{ route('user.destroy', $user) }}" method="post">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <button class="btn btn-danger">Delete account</button>--}}
{{--    </form>--}}
@endsection
