@extends('layouts.dashboard', ['title' => 'Menu User', 'state' => 'user', 'page' => 'user'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h3>Page Edit User</h3>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">General Info</h3>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off" spellcheck="false" placeholder="Enter full name" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" autocomplete="off" spellcheck="false" placeholder="Enter address" value="{{ $user->address }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="city" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm-8">
                              <input type="text" class="form-control" placeholder="City" id="city" name="city" aria-label="City" autocomplete="off" spellcheck="false" value="{{ $user->city }}" required>
                            </div>
                            <div class="col-sm">
                              <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phone" autocomplete="off" spellcheck="false" value="{{ $user->phone }}" required>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" spellcheck="false" placeholder="Enter email" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="profession" class="col-sm-2 col-form-label">Profession</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profession" name="profession" autocomplete="off" spellcheck="false" placeholder="Enter profession user" value="{{ $user->profession }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" spellcheck="false" placeholder="Enter username" value="{{ $user->username }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </form>
        </div>
    </section>
@endsection
