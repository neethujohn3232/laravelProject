@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Welcome to Product Management System 2025</h1>
    <p>A simple application to manage your products.</p>
    
    @guest
        <div style="margin-top: 20px;">
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn" style="margin-left: 10px;">Register</a>
        </div>
    @else
        <div style="margin-top: 20px;">
            <a href="{{ route('products.index') }}" class="btn">Go to Your Products</a>
        </div>
    @endguest
</div>
@endsection