@extends('layout.admin')
@section('title', 'Create Store')

@push('head')
    <script src="{{ asset('js/create-store.js') }}?v={{ time() }}"></script>
@endpush



@section('content')
    {{-- <h1 class="mt-4">Create Store</h1> --}}
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">
            <a href="{{ url('merchant/store-list') }}" style="text-decoration: none; color: #6c757d !important">Dashboard</a>
        </li>
    </ol>


    <div class="card-body">

        {{-- <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                    <label for="inputFirstName">First name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                    <label for="inputLastName">Last name</label>
                </div>
            </div>
        </div> --}}
        <input type="hidden" name="id_user" value="{{ session('user')->id }}">
        <div class="form-floating mb-3">
            <input class="form-control" id="store_name" name="store_name" type="text" placeholder="Enter the store name..." />
            <label for="store_name">Store Name</label>
        </div>
        {{-- <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                    <label for="inputPassword">Password</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                    <label for="inputPasswordConfirm">Confirm Password</label>
                </div>
            </div>
        </div> --}}
        <div class="mt-4 mb-0" style="display: flex; justify-content: end">
            <button class="btn btn-primary btn-block" type="button" onclick="createStore()">Create Store</button>
        </div>

    </div>
@endsection
