@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">&larr; Back to Products</a>
    </div>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input name="price" type="number" step="0.01" class="form-control"
                   value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label>In Stock</label>
            <select name="in_stock" class="form-control" required>
                <option value="1" {{ $product->in_stock ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$product->in_stock ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Manufacture Date</label>
            <input name="manufature_date" type="date" class="form-control"
                   value="{{ old('manufature_date', $product->manufature_date) }}" required>
        </div>
        <div class="mb-3">
            <label>Main Image</label><br>
            @if ($product->main_image)
                <img src="{{ asset('storage/' . $product->main_image) }}" width="100" class="rounded mb-2">
            @endif
            <input name="main_image" type="file" class="form-control">
            <small class="text-muted">Leave blank to keep the current image</small>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Update Product</button>
    </form>
@endsection
