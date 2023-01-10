@extends('admin.layout.master')
@section('content')
<a class="btn btn-simple btn-success" href="{{ route('categories.create') }}">
    Add new category
</a>

<table class="table">
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
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
@endsection
