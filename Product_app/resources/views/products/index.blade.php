@extends('layouts.app')

@section('content')
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
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" 
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
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