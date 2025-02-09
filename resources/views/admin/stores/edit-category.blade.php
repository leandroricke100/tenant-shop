@extends('layout.admin')
@section('title', 'Edit Store')

@push('head')
    <script src="{{ asset('js/edit.js') }}?v={{ time() }}"></script>
@endpush
@php
    use App\Models\Category;
    use App\Models\Store;

    $categorySelect = Category::find($id);
    $user = session('user');

    if ($user->admin == 1) {
        $stores = Store::all();
    } else {
        $stores = Store::where('id_user', $user->id)->get();
    }

    // $selectedStoreIds = json_decode($categorySelect->id_store, true) ?? [];
    // if (!is_array($selectedStoreIds)) {
    //     $selectedStoreIds = [$selectedStoreIds];
    // }
@endphp

@section('content')

    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ url('merchant/category-list') }}" style="text-decoration: none; color: #6c757d !important">
                Dashboard
            </a>
        </li>
    </ol>

    <div class="card-body">
        <input type="hidden" name="id_user" value="{{ $categorySelect->id_user }}">
        <input type="hidden" name="id_category" value="{{ $categorySelect->id }}">

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="category_name" name="category_name" type="text" placeholder="Enter the category name..." value="{{ $categorySelect->name_category }}" />
                    <label for="category_name">Category Name</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_store">
                        <option value="">Selecione uma loja</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" {{ $categorySelect->id_store == $store->id ? 'selected' : '' }}>
                                {{ $store->store_name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="id_store">Escolha uma loja:</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="editCategory()">Edit Category</button>
        </div>
    </div>

@endsection
