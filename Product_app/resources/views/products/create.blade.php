@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Add New Product</h2>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock Quantity</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required>
            @error('stock')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="out_of_stock" {{ old('status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
            @error('status')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Add Product</button>
            <a href="{{ route('products.index') }}" style="margin-left: 10px;">Cancel</a>
        </div>
    </form>
</div>
@endsection