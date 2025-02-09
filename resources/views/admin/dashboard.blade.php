@extends('layout.admin')

@section('title', 'Admin Dashboard')

@push('head')
    <script src="{{ asset('js/edit-store.js') }}?v={{ time() }}"></script>
@endpush

@php
    use App\Models\Store;
    use App\Models\User;

    $user = session('user');

    //dd($user);

    if ($user->admin == 1) {
        $stores = Store::all();
    } else {
        $stores = Store::where('id_user', $user->id)->get();
    }

    foreach ($stores as $store) {
        $email = User::where('id', $store->id_user)->first()->email ?? '';
        $store->email = $email;
    }

@endphp



@section('content')
    <h1 class="mt-4">Stores</h1>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    {{-- <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Store List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                {{-- SE $STORES NAO FOR NULL --}}
                @if (count($stores) > 0)
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Merchant Name</th>
                            <th>Merchant Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Merchant Name</th>
                            <th>Merchant Email</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->store_name }}</td>
                                <td>{{ $store->email }}</td>
                                <td>
                                    <a href="{{ url('merchant/edit-store/' . $store->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="deleteStore({{ $store->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                @endif
            </table>
        </div>
    </div>
@endsection
