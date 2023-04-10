@extends('admin.layout.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tags.update', $tag) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Category</label>
        <br>
        <input type="text" name="name" class="form-control" value="{{ $tag->name }}">
    </div>
    <button class="btn btn-fill btn-success">Update</button>
</form>
@endsection
