@extends('admin.layout.master')
@section('content')
    <a class="btn btn-simple btn-success" href="{{ route('categories.create') }}">
        Add new category
    </a>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>View Posts</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('categories.show', $category->id) }}">
                        View
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModalCenter{{$category->id}}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h2 class="title-modern text-center" id="exampleModalLongTitle">Are you sure
                                        ?</h2>
                                </div>
                                <div class="modal-body">
                                    <h4 class="title-modern  text-center">
                                        Do you really want to delete this ?
                                        This process cannot be undone !
                                    </h4>
                                </div>

                                <form class="delete-form"
                                      data-route="{{route('categories.destroy',$category->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-fill btn-secondary"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-fill btn-danger">Delete</button>
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
        {{ $categories->links() }}
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
