@extends('layout.layout-login')

@section('title', 'Login')

@push('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('login/css/login.css') }}">
    <script src="{{ asset('login/js/login.js') }}?v={{ time() }}"></script>
@endpush

@section('content')

    <div class="container">
        <h2>Login</h2>

        <div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your shop password" required>
            </div>
            <button type="button" onclick="login()" class="btn btn-primary">Login</button>
        </div>

        <a href="{{ route('website', ['c1' => 'register']) }}" class="btn btn-link">Don't have an account? Sign up here</a>

    </div>
@endsection
