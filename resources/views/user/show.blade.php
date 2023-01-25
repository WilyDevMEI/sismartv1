@extends('layouts.dashboard', ['title' => 'Menu User', 'state' => 'user', 'page' => 'user'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </nav>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
                <h3 class="text-muted">User Detail</h3>
                <hr>
                <div class="row mt-4 mb-3">
                    <label for="name" class="col-sm-2 fw-bold">Full Name</label>
                    <div class="col-sm-10 col-form-label">{{ $user->name }}</div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 fw-bold">Address</label>
                    <div class="col-sm-10 col-form-label">{{ $user->address }}</div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 fw-bold">City</label>
                    <div class="col-sm-10 col-form-label">{{ $user->city }}</div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 fw-bold">Phone Number</label>
                    <div class="col-sm-10 col-form-label">{{ $user->phone }}</div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 fw-bold">Email</label>
                    <div class="col-sm-10 col-form-label">{{ $user->email }}</div>
                </div>
                <div class="row mb-3">
                    <label for="profession" class="col-sm-2 fw-bold">Profession</label>
                    <div class="col-sm-10 col-form-label">{{ $user->profession }}</div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 fw-bold">Username</label>
                    <div class="col-sm-10 col-form-label">{{ $user->username }}</div>
                </div>
        </div>
    </section>
@endsection
