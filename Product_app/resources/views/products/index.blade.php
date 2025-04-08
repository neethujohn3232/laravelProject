@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Your Products</h2>
        <a href="{{ route('products.create') }}" class="btn">Add New Product</a>
    </div>
    
    @if(count($products) > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: blue;">View</a> |
                        <a href="{{ route('products.edit', $product->id) }}" style="text-decoration: none; color: green;">Edit</a> |
                        <button type="button" class="btn btn-link p-0" style="color: red; text-decoration: none;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
        Delete
    </button>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products found. Start by adding a new product!</p>
    @endif
</div>
@endsection