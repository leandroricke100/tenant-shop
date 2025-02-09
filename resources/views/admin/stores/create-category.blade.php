@extends('layout.admin')
@section('title', 'Create Category')

@push('head')
    <script src="{{ asset('js/create.js') }}?v={{ time() }}"></script>
@endpush



@section('content')
    {{-- <h1 class="mt-4">Create Store</h1> --}}
    @php
        $user = session('user')->admin;
    @endphp
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ url(isset($user) && $user ? 'admin/dashboard' : 'merchant/store-list') }}" style="text-decoration: none; color: #6c757d !important">Dashboard</a>
        </li>
    </ol>


    <div class="card-body">


        <input type="hidden" name="id_user" value="{{ session('user')->id }}">
        <div class="form-floating mb-3">
            <input class="form-control" id="name_category" name="name_category" type="text" placeholder="Enter the category name..." />
            <label for="name_category">Category Name</label>
        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="createCategory()">Create Category</button>
        </div>

    </div>
@endsection
