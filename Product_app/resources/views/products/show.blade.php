@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Product Details</h2>
    <div>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <p><strong>Status:</strong> {{ ucfirst($product->status) }}</p>
        <p><strong>Created:</strong> {{ $product->created_at->format('M d, Y H:i') }}</p>
        <p><strong>Last Updated:</strong> {{ $product->updated_at->format('M d, Y H:i') }}</p>
    </div>
    <div style="margin-top: 20px;">
        <a href="{{ route('products.edit', $product->id) }}" class="btn">Edit</a>
        <a href="{{ route('products.index') }}" style="margin-left: 10px;">Back to List</a>
    </div>
</div>
@endsection