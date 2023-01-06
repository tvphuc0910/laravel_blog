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
<form action="{{ route('categories.update', $category) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Category</label>
        <br>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
    <button>Update</button>
</form>
@endsection
