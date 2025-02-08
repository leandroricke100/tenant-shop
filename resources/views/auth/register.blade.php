@extends('layout.layout-login')

@section('title', 'Register')

@push('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('login/css/login.css') }}">
    <script src="{{ asset('login/js/register.js') }}?v={{ time() }}"></script>
@endpush

@section('content')
    <div class="container">
        <h2>Merchant Register</h2>

        <div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your e-mail" required>
            </div>

            <div class="form-group">
                <label for="store_name">Store Name</label>
                <input type="text" name="store_name" class="form-control" placeholder="Enter your shop name" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="button" onclick="register()" class="btn btn-primary">Register</button>

        </div>

        <a href="{{ route('website', ['c1' => '/']) }}" class="btn btn-link">Already have an account? Log in here</a>
    </div>
@endsection
