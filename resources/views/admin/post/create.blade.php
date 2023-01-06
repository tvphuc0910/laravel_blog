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
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{$category->name}}
            </option>
        @endforeach
    </select>
    <div class="form-group">
        <label>Title</label>
        <br>
        <input type="text" name="title" class="form-control">
    </div>
    Description
    <br>
    <textarea name="description"></textarea>
    <br>
    Content
    <br>
    <textarea class="ckeditor" id="editor1" name="content"></textarea>
    <br>
    Image
    <input type="file" name="photo">
    <br>
    <button>Create</button>
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

