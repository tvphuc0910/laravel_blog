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

    {{--    <a class="btn btn-simple btn-success" href="{{ route('categories.create') }}">--}}
    {{--        Add new category--}}
    {{--    </a>--}}

    <button type="button" class="btn btn-success" data-toggle="modal"
            data-target="#insertModalCenter">
        Add new category
    </button>
    <!-- Modal -->
    <div class="modal fade" id="insertModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="card">
                <form id="addNewTagForm" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="card-header text-center">
                        <h4 class="card-title">
                            Add new Category
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label class="control-label">Category Name
                                <star>*</star>
                            </label>
                            <input id="name" class="form-control" name="name"
                                   type="text"
                                   required="true" value="{{ old('name') }}"
                            />
                        </div>
                        <div class="category">
                            <star>*</star>
                            Required fields
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="addcategory" type="submit" class="btn btn-info btn-fill">Save</button>
                        <button type="button" class="btn btn-fill btn-secondary"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
{{--                    <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">--}}
{{--                        Edit--}}
{{--                    </a>--}}
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#editModalCenter{{$category->id}}">
                        Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="editModalCenter{{$category->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="card">
                                <form action="{{ route('categories.update', $category) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header text-center">
                                        <h4 class="card-title">
                                            Edit category
                                        </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="form-group">
                                            <label class="control-label">Category Name
                                                <star>*</star>
                                            </label>
                                            <input id="name" class="form-control" name="name"
                                                   type="text"
                                                   required="true" value="{{ $category->name }}"
                                            />
                                        </div>
                                        <div class="category">
                                            <star>*</star>
                                            Required fields
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="updatecategory" type="submit" class="btn btn-info btn-fill">Save</button>
                                        <button type="button" class="btn btn-fill btn-secondary"
                                                data-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deleteModalCenter{{$category->id}}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModalCenter{{$category->id}}" tabindex="-1" role="dialog"
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
                                        <button type="submit" class="btn btn-fill btn-danger">Delete</button>
                                        <button type="button" class="btn btn-fill btn-secondary"
                                                data-dismiss="modal">Cancel
                                        </button>
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

        $(document).ready(function () {

            $('#addcategory').on('click', function () {
                e.preventDefault();

                var name = $('#name').val();
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $(this).data('route'),
                    data: {
                        name : name
                    },
                    success: function (response, textStatus, xhr) {
                        location.reload();
                    }
                });
            });

            $('#updatecategory').on('click', function () {
                e.preventDefault();

                var name = $('#name').val();
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $(this).data('route'),
                    data: {
                        name : name
                    },
                    success: function (response, textStatus, xhr) {
                        location.reload();
                    }
                });
            });

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
        });

    </script>
@endsection
