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
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {{ $categories->links() }}
    </div>
    <br>
@endsection
