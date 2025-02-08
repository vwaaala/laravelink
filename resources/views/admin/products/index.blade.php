@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create Product</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->getTranslation('name', 'en') }}</td>
                        <td>{{ $product->category->getTranslation('name', 'en') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ ucfirst($product->status) }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
