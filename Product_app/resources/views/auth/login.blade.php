@extends('layouts.app')

@section('content')
<div class="card">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Login</button>
        </div>
    </form>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
</div>
@endsection