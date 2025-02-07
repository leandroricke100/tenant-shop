<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h2>Merchant Register</h2>

        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your e-mail" required>
            </div>

            <div class="form-group">
                <label for="email">Shop Name</label>
                <input type="text" name="shop_name" class="form-control" placeholder="Enter your shop name" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <a href="{{ route('website', ['c1' => '/']) }}" class="btn btn-link">Already have an account? Log in here</a>
    </div>
</body>
</html>
