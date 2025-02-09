@extends('layout.admin')
@section('title', 'Create Store')

@push('head')
    <script src="{{ asset('js/edit-store.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Store;

    $store = Store::find($id);
  //dd($store);
@endphp


@section('content')
    {{-- <h1 class="mt-4">Create Store</h1> --}}
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ url('merchant/store-list') }}" style="text-decoration: none; color: #6c757d !important">Dashboard</a>
        </li>
    </ol>


    <div class="card-body">
        <input type="hidden" name="id_user" value="{{ $store->id_user }}">
        <input type="hidden" name="id_store" value="{{ $store->id }}">
        <div class="form-floating mb-3">
            <input class="form-control" id="store_name" name="store_name" type="text" placeholder="Enter the store name..." value="{{ $store->store_name }}" />
            <label for="store_name">Store Name</label>
        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="editStore()">Edits Store</button>
        </div>

    </div>
@endsection
