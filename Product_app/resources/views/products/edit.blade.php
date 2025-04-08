@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Edit Product</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price </label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock Quantity</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="out_of_stock" {{ old('status', $product->status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
            @error('status')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Update Product</button>
            <a href="{{ route('products.index') }}" style="margin-left: 10px;">Cancel</a>
        </div>
    </form>
</div>
@endsection