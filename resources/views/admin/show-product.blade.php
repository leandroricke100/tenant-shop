@extends('layout.admin')

@section('title', 'Admin Dashboard')

@push('head')
    <script src="{{ asset('js/edit.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Product;
    use App\Models\User;

    $user = session('user');

    //dd($user);

    if ($user->admin == 1) {
        $products = Product::all();
    } else {
        $products = Product::where('id_user', $user->id)->get();
    }
    //dd($products);
    // foreach ($products as $store) {
    //     $email = User::where('id', $store->id_user)->first()->email ?? '';
    //     $store->email = $email;
    // }
@endphp



@section('content')
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
                {{-- SE $products NAO FOR NULL --}}
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


                        <tr>
                            <td>1</td>
                            <td>ihpne 14</td>
                            <td>kings iphones</td>
                            <td>iphones</td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a class="btn btn-danger">Delete</a>
                            </td>
                        </tr>



                        {{-- @foreach ($products as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->store_name }}</td>
                                <td>{{ $store->email }}</td>
                                <td>
                                    <a href="{{ url(isset($user) && $user ? 'admin/edit-store/' . $store->id : 'merchant/edit-store/' . $store->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="deleteStore({{ $store->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                @endif
            </table>
        </div>
    </div>
@endsection
