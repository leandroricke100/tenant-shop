@extends('layout.admin')

@section('title', 'Admin Dashboard')

@push('head')
    <script src="{{ asset('js/edit.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Product;
    use App\Models\User;
    use App\Models\Store;
    use App\Models\Category;

    $user = session('user');

    if ($user->admin == 1) {
        $products = Product::all();
    } else {
        $products = Product::where('id_user', $user->id)->get();
    }
    foreach ($products as $product) {
        $product->store_name = Store::where('id', $product->id_store)->first()->store_name ?? '';
        $product->category_name = Category::where('id', $product->id_category)->first()->name_category ?? '';
    }

@endphp



@section('content')
    @php
        $user = session('user')->admin;
    @endphp
    <h1 class="mt-4">Products</h1>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Store List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                @if (count($products) > 0)
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Store</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Store</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name_product }}</td>
                                <td>{{ $product->store_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>
                                    <a href="{{ url(isset($user) && $user ? 'admin/edit-product/' . $product->id : 'merchant/edit-product/' . $product->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                @endif
            </table>
        </div>
    </div>
@endsection
