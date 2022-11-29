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
    <textarea name="content"></textarea>
    <br>
    Image
    <input type="file" name="photo">
    <br>
    <button>Create</button>
</form>
