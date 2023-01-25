@extends('layouts.dashboard', ['title' => 'Menu Penetrasi', 'state' => 'marketing', 'page' => 'penetration'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penetrasi</li>
            </ol>
        </nav>
        <h2>Menu Penetrasi</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('penetration.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">New Penetration</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            <option selected value="">Select customer...</option>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}">{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_penetration" class="col-sm-2 col-form-label fw-bold">Tanggal Penetrasi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_penetration" name="date_penetration"
                            autocomplete="off" spellcheck="false" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik Penetrasi</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="topic" id="topic" required>
                            <option selected value="">Select topic of penetration...</option>
                            <option value="Produk">Produk</option>
                            <option value="Jasa">Jasa</option>
                            <option value="Produk & Jasa">Produk & Jasa</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Penetrasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC penetration" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="issue" class="col-sm-2 col-form-label fw-bold">Kendala</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="issue" name="issue" placeholder="Enter issue" rows="6" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Penetrasi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result penetration" rows="6"
                            required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>

    <section id="data">
        <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
            <table id="data-section" class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date Penetration</th>
                        <th scope="col">Name Company</th>
                        <th scope="col">Topic</th>
                        <th scope="col">PIC</th>
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
                ajax: '{!! route('penetration.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'date_penetration',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'topic',
                    },
                    {
                        data: 'pic',
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
