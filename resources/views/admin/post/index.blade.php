@extends('admin.layout.master')
@section('content')
    <a class="btn btn-simple btn-success" href="{{ route('posts.create') }}">
        Write new post
    </a>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Tags</th>
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
                <td>{{ $post->category->name }}</td>
                <td>
                    @foreach($post->tag as $tag)
                        <span class="label label-info">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    @if(!empty($post->photo))
                        <img src="{{ asset('storage/'. $post->photo) }}" height="50">
                    @endif
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
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModalCenter{{$post->id}}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter{{$post->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h2 class="title-modern text-center" id="exampleModalLongTitle">Are you sure ?</h2>
                                </div>
                                <div class="modal-body">
                                    <h4 class="title-modern text-center">
                                        Do you really want to delete this ?
                                        This process cannot be undone !
                                    </h4>
                                </div>

                                <form class="delete-form" data-route="{{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button class="btn btn-fill btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {{ $posts->links() }}
    </div>
    <br>
@endsection

@section('script')
    <script type="text/javascript">

        $('.delete-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(this).data('route'),
                data: {
                    '_method': 'delete'
                },
                success: function (response, textStatus, xhr) {
                    location.reload();
                }
            });
        })
    </script>
@endsection

