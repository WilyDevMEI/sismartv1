@extends('layouts.dashboard', ['title' => 'Menu User', 'state' => 'user', 'page' => 'user'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
                {{-- <li class="breadcrumb-item"><a href="{{ route('konsumen.index') }}">Konsumen</a></li> --}}
            </ol>
        </nav>
        <h3>Page User</h3>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('user.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">General Info</h3>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off" spellcheck="false" placeholder="Enter full name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" autocomplete="off" spellcheck="false" placeholder="Enter address" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="city" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm-8">
                              <input type="text" class="form-control" placeholder="City" id="city" name="city" aria-label="City" autocomplete="off" spellcheck="false" required>
                            </div>
                            <div class="col-sm">
                              <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phone" autocomplete="off" spellcheck="false" required>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" spellcheck="false" placeholder="Enter email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="profession" class="col-sm-2 col-form-label">Profession</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="profession" name="profession" autocomplete="off" spellcheck="false" placeholder="Enter profession user" required>
                    </div>
                </div>

                <h3 class="text-muted mt-4">User Account</h3>
                <div class="form-small mb-4 text-muted">Set user account to login on system marketing</div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" spellcheck="false" placeholder="Enter username" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" spellcheck="false" placeholder="Enter password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Data</button>
            </form>
        </div>
    </section>
    <section id="data">
        <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
            <table id="data-section" class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Has Role</th>
                        <th scope="col" class="w-25">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#data-section').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 25,
                pagingType: "simple_numbers",
                ajax: '{!! route('user.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'city',
                    },
                    {
                        data: 'phone',
                    },
                    {
                        data: 'profession',
                    },
                    {
                        data: 'has_role',
                        render : function ( data, type, row, meta ) {
                                return '<a href="'+ data.link+ '" class="btn btn-sm btn-outline-primary btn-show" role="button">Role</a>';
                                }
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ]
            });
        });
    </script>
@endpush
