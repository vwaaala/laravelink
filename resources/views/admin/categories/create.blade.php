@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add New Category</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_en" class="form-label">Name (English)</label>
                <input type="text" id="name_en" name="name[en]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
