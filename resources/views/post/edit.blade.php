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
    @method('PUT')
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}
            </option>
        @endforeach
    </select>
    <div class="form-group">
        <label>Title</label>
        <br>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
    </div>
    Description
    <br>
    <textarea name="description">{{ $post->description }}</textarea>
    <br>
    Content
    <br>
    <textarea name="content">{{ $post->content }}</textarea>
    <br>
    Image
    <input type="file" name="photo">
    <br>
    <button>Update</button>
</form>
