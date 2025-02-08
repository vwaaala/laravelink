@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Category</h1>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_en" class="form-label">Name (English)</label>
                <input type="text" id="name_en" name="name[en]" class="form-control"
                    value="{{ $category->getTranslation('name', 'en') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
