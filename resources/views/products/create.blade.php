@extends('layouts.app')
@section('title', 'Add Product')

@section('content')
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>In Stock</label>
            <select name="in_stock" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Manufacture Date</label>
            <input name="manufature_date" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Main Image</label>
            <input name="main_image" type="file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Save Product</button>
    </form>
@endsection
