@extends('layouts.app')
@section('title', 'All Products')

@section('content')
    <div
        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-2">
        <h5 class="mb-0">📦 Products</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Product
        </a>
    </div>
    <div class="mb-3">
        <span class="fs-6">Total: {{ $products->total() }} products</span>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
            <tr class="text-center">
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Manufacture</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td class="text-muted small">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                    <span class="badge bg-{{ $product->in_stock ? 'success' : 'danger' }}">
                        {{ $product->in_stock ? 'Yes' : 'No' }}
                    </span>
                    </td>
                    <td>{{ $product->manufature_date }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->main_image) }}" width="50" class="rounded"
                             alt="Image">
                    </td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-sm btn-outline-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                              class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No products available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if ($products->hasPages())
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">
                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}">«</a>
                    </li>
                    <li class="page-item active"><span class="page-link">{{ $products->currentPage() }}</span></li>
                    <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">»</a>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
@endsection

