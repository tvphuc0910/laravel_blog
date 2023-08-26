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
    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Category</label>
        <div class="form-group">
            @method('PUT')
            <select name="category_id" class="selectpicker col-lg-2" >
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Title</label>
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <br>
            <textarea class="form-control" name="description">{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <br>
            <textarea class="ckeditor form-control" id="editor1" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select multiple class="form-control" name="tag[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                            @foreach($post->tag as $selectedTag)
                                @if($tag->id == $selectedTag->id)
                                    selected="selected"
                        @endif
                        @endforeach
                    >{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input class="custom-file-input" type="file" name="photo">
        </div>
        <button class="btn btn-fill btn-success">Update</button>
        <script>
            CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: '{{asset('ckfinder/ckfinder.html')}}',
                filebrowserUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}'
            });
        </script>
        <script>
            var data = CKEDITOR.instances.editor1.getData();

            // Your code to save "data", usually through Ajax.
        </script>
    </form>
@endsection
