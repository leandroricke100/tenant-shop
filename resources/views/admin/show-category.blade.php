@extends('layout.admin')

@section('title', 'Admin Dashboard')

@push('head')
    <script src="{{ asset('js/edit.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Category;
    use App\Models\User;
    use App\Models\Store;

    $user = session('user');

    //dd($user);

    if ($user->admin == 1) {
        $categories = Category::all();
    } else {
        $categories = Category::where('id_user', $user->id)->get();
    }
    //dd($categories);
    foreach ($categories as $store) {
        // $id_store = json_decode($store->id_store, true);
        $store->name_store = Store::where('id', $store->id_store)->first()->store_name ?? '';
        //dd($store);
    }
@endphp



@section('content')
    @php
        $user = session('user')->admin;
    @endphp
    <h1 class="mt-4">Categories</h1>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ url(isset($user) && $user ? 'admin/dashboard' : 'merchant/store-list') }}" style="text-decoration: none; color: #6c757d !important">Dashboard</a>
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Store List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                {{-- SE $categories NAO FOR NULL --}}
                @if (count($categories) > 0)
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Merchant Name</th>
                            <th>Merchant Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Merchant Name</th>
                            <th>Merchant Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name_category }}</td>
                                <td>{{ $category->name_store }}</td>
                                <td>
                                    <a href="{{ url(isset($user) && $user ? 'admin/edit-category/' . $category->id : 'merchant/edit-category/' . $category->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="deleteCategory({{ $category->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                @endif
            </table>
        </div>
    </div>
@endsection
