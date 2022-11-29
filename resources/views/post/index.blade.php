<a href="{{ route('posts.create') }}">
    Thêm
</a>

<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Category id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->category_id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>
                <img src="{{ asset('storage/'. $post->photo) }}" height="50">
            </td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
        </tr>
    @endforeach
</table>
