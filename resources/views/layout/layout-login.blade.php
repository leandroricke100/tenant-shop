<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('snippets.font-awesome-pro')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('snippets/toastr/toastr.css') }}">
    <script src="{{ asset('snippets/toastr/toastr.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    @stack('head')
</head>

<body>
    @yield('content')

</body>

</html>
