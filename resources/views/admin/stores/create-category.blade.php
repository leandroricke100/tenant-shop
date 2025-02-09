@extends('layout.admin')
@section('title', 'Create Category')

@push('head')
    <script src="{{ asset('js/create.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Store;
    use App\Models\User;

    $user = session('user');

    if ($user->admin == 1) {
        $stores = Store::all();
    } else {
        $stores = Store::where('id_user', $user->id)->get();
    }
@endphp

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
        {{-- <div class="form-floating mb-3">
            <input class="form-control" id="name_category" name="name_category" type="text" placeholder="Enter the category name..." />
            <label for="name_category">Category Name</label>
        </div> --}}

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="name_category" name="name_category" type="text" placeholder="Enter the category name..." />
                    <label for="name_category">Category Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" id="id_store">
                        @if ($stores->isEmpty())
                            <option selected disabled>No option available</option>
                        @else
                            @foreach ($stores as $s)
                                <option value="{{ $s->id }}">{{ $s->store_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="id_store">Chose an option:</label>
                </div>
            </div>

        </div>

        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="createCategory()">Create Category</button>
        </div>

    </div>
@endsection
