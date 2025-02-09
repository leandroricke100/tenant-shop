@extends('layout.admin')
@section('title', 'Edit Product')

@push('head')
    <script src="{{ asset('js/edit.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Store;
    use App\Models\Category;
    use App\Models\User;
    use App\Models\Product;

    $user = session('user');

    $product = Product::find($id);

    $storeSelect = Store::find($product->id_store);

    $categorySelect = Category::find($product->id_category);

    // dd($storeSelect);

    if ($user->admin == 1) {
        $stores = Store::all();
        $categories = Category::all();
    } else {
        $stores = Store::where('id_user', $user->id)->get();
        $categories = Category::where('id_user', $user->id)->get();
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
        <input type="hidden" name="id_product" value="{{ $product->id }}">

        <!-- Store Selection -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_store">
                        @if ($stores->isEmpty())
                            <option selected disabled>No option available</option>
                        @else
                            @foreach ($stores as $s)
                                <option value="{{ $s->id }}" {{ $s->id == $storeSelect->id ? 'selected' : '' }}>{{ $s->store_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="id_store">Store</label>
                </div>
            </div>

            <!-- Category Selection -->
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_category" disabled>
                        <option value="{{ $categorySelect->id }}" name="id_category" selected disabled>
                            {{ $categorySelect->name_category }}
                        </option>
                    </select>
                    <label for="id_category">Category</label>
                </div>
            </div>

        </div>

        <!-- Product Name -->
        <div class="row mb-3">
            <div class="col-md-6" style="width: 100% !important">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control w-100" id="product_name" name="product_name" type="text" placeholder="Enter product name" value="{{ $product->name_product }}"/>
                    <label for="product_name">Product Name</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="editProduct()">Edit Product</button>
        </div>
    </div>


@endsection
