@extends('layout.admin')
@section('title', 'Create Category')

@push('head')
    <script src="{{ asset('js/create.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Store;
    use App\Models\Category;
    use App\Models\User;

    $user = session('user');

    if ($user->admin == 1) {
        $stores = Store::all();
    } else {
        $stores = Store::where('id_user', $user->id)->get();
    }
@endphp

@section('content')
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

        <!-- Store Selection -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_store">
                        <option selected disabled>Choose a store</option>
                        <option value="" disabled selected>No options selected</option>
                        @foreach ($stores as $s)
                            <option value="{{ $s->id }}">{{ $s->store_name }}</option>
                        @endforeach
                    </select>
                    <label for="id_store">Store</label>
                </div>
            </div>

            <!-- Category Selection -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_category" disabled>
                        <option selected disabled>Choose a category</option>
                    </select>
                    <label for="id_category">Category</label>
                </div>
            </div>
        </div>

        <!-- Product Name -->
        <div class="row mb-3">
            <div class="col-md-6" style="width: 100% !important">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control w-100" id="product_name" name="product_name" type="text" placeholder="Enter product name" />
                    <label for="product_name">Product Name</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="createProduct()">Create Product</button>
        </div>
    </div>


@endsection
