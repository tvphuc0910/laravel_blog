@extends('admin.layout.master')
@section('content')
    @if($msg = session('msg_error'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ $msg }}</li>
            </ul>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$category->id}}">
                        Delete
                    </button>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h2 class="modal-title " id="exampleModalLongTitle">Are you sure ?</h2>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center">
                                            Do you really want to delete this ?
                                            This process cannot be undone !
                                        </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-fill btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
{{--                    <form action="{{ route('categories.destroy', $category) }}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-danger">Delete</button>--}}
{{--                    </form>--}}
                </td>
            </tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {{ $categories->links() }}
    </div>
    <br>
@endsection
