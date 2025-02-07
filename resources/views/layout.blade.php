<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> --}}
    @include('snippets.font-awesome-pro')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-kVTqrBbpptzF0V6F5+G0z6Rz00DbDRp54eXjtkI8l3IY3PfJEn5f5iF5UbkHzX+1" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('snippets/fontawesome-pro.css') }}" /> --}}

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="{{ asset('snippets/fontawesome-pro.js') }}"></script> --}}


    <link rel="stylesheet" href="{{ asset('snippets/toastr/toastr.css') }}">
    <script src="{{ asset('snippets/toastr/toastr.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    @stack('head')
</head>

<body>
    @yield('content')

</body>

</html>
