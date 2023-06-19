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
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<a class="btn btn-simple btn-success" href="{{ route('tags.create') }}">
    Add new tag
</a>

<table class="table">
    <tr>
        <th>#</th>
        <th>Tag</th>
        <th>View Posts</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('tags.show', $tag->id) }}">
                    View
                </a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('tags.edit', $tag) }}">
                    Edit
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$tag->id}}">
                    Delete
                </button>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            </td>
        </tr>
    @endforeach
</table>
<div class="col-md-12 text-center">
    {{ $tags->links() }}
</div>
<br>
@endsection
