@extends('layouts.app')
@section('title', 'Product Details')

@section('content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">&larr; Back to Products</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">{{ $product->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $product->main_image) }}" class="img-fluid rounded border"
                         alt="Main Image">
                </div>
                <div class="col-md-8">
                    <p><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>In Stock:</strong> {{ $product->in_stock ? 'Yes' : 'No' }}</p>
                    <p><strong>Manufacture Date:</strong> {{ $product->manufature_date }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-start gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
