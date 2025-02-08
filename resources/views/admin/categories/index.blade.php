@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manage Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->getTranslations('name')['en'] }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
