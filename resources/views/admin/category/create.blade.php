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
<form action="{{ route('categories.store') }}" method="post" >
    @csrf
    <div class="form-group">
        <label>Category</label>
        <br>
        <input type="text" name="name" class="form-control">
    </div>
    <button class="btn btn-fill btn-success">Create</button>
</form>
@endsection
