@extends('layouts.dashboard', ['title' => 'Menu Role', 'state' => 'user', 'page' => 'role'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role</li>
            </ol>
        </nav>
        <h3>Page Roles</h3>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('role.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted fw-bold mb-3">Role</h3>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter name role" autocomplete="off" spellcheck="false" name="name">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                </div>

            </form>
        </div>
    </section>
    <section id="data">
        <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
            <table id="data-section" class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col" class="w-25">#</th>
                        <th scope="col" class="w-50">Name Role</th>
                        <th scope="col" class="w-25">Permission</th>
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
                ajax: '{!! route('role.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'permission',
                        render : function ( data, type, row, meta ) {
                        return '<a href="'+ data.link+ '" class="btn btn-sm btn-outline-primary btn-show" role="button">Show Permission</a>';
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
