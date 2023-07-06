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
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="selectpicker col-lg-2" >
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <label>Title</label>
        <div class="form-group">
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
    </div>
    <div class="form-group">
        <label>Description</label>
        <br>
        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label>Content</label>
        <br>
        <textarea class="ckeditor form-control" id="editor1" name="content">{{ old('content') }}</textarea>
    </div>
    <div class="form-group">
        <label>Tags</label>
            <select multiple title="Select Tags" name="tag[]" class="selectpicker col-lg-2" data-style="btn-info btn-fill btn-block" data-size="5">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input class="custom-file-input" type="file" name="photo">
    </div>
    <button class="btn btn-fill btn-success">Create</button>
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{asset('ckfinder/ckfinder.html')}}',
            filebrowserUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}'
        } );
    </script>
    <script>
        var data = CKEDITOR.instances.editor1.getData();

        // Your code to save "data", usually through Ajax.
    </script>
</form>
@endsection

