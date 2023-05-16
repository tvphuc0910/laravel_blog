@extends('admin.layout.master')
@section('content')
    <a class="btn btn-simple btn-success" href="{{ route('posts.create') }}">
        Write new post
    </a>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <img src="{{ asset('storage/'. $post->photo) }}" height="50">
                </td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('blog.show', $post)}}">
                        View
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('posts.edit', $post) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {{ $posts->links() }}
    </div>
    <br>
@endsection
