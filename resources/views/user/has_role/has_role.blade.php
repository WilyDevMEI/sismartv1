@extends('layouts.dashboard', ['title' => 'Menu Has Role', 'state' => 'user', 'page' => 'user'])
@section('content')
    <section id="user-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Has Role</li>
            </ol>
        </nav>
        <h3>Page Has Roles</h3>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('giveRole', [$user->id]) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted fw-bold mb-3">Role Data</h3>
                <div class="input-group mb-3">
                    <select class="form-select" id="select-role" name="role[]" multiple="multiple" required>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                    <button type="submit" class="btn btn-primary">Save Role</button>
                </div>

            </form>
        </div>
    </section>
    <section id="data">
        <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-1 col-form-label fw-bold">USER :</label>
                <div class="col-sm-10 col-form-label">{{ $user->name }}</div>
              </div>
            <table id="data-section" class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Has Role</th>
                        <th scope="col" class="w-25">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <form action="{{ route('remove.role', [$user->id, $item->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">Remove Role</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-info m-0">Data role user masih kosong</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#select-role').select2({
                placeholder: 'Select role...',
                width: 'resolve'
            });
        })
    </script>
@endpush
