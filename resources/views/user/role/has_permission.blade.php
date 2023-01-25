@extends('layouts.dashboard', ['title' => 'Menu Has Role', 'state' => 'user', 'page' => 'role'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permission</li>
            </ol>
        </nav>
        <h3>Page Has Permission</h3>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('give.permission', ['role' => $role->id]) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted fw-bold mb-3">Permission</h3>
                <select class="form-select" id="select-permission" name="permission[]" multiple="multiple" required>
                    @foreach ($permissions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                <div class="input-group mt-3">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                </div>
            </form>
        </div>
    </section>
    <section id="data">
        <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
            <div class="row mb-3">
                <label class="col-sm-1 col-form-label fw-bold">Role name</label>
                <div class="col-sm-10 col-form-label">{{ $role->name }}</div>
            </div>

            <table class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Permission</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasPermissions as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('revoke.permission', [$role->id, $item->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Revoke Permission</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#select-permission').select2({
                placeholder: 'Select permission...',
                width: 'resolve'
            });
        })
    </script>
@endpush
