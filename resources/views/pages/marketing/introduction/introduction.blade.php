@extends('layouts.dashboard', ['title' => 'Menu Introduction', 'state' => 'marketing', 'page' => 'introduction'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Introduction</li>
            </ol>
        </nav>

        <h2>Menu Introduction</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('introduction.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">New Introduction</h3>
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
                    <label for="date_introduction" class="col-sm-2 col-form-label fw-bold">Tanggal Introduction</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_introduction" name="date_introduction"
                            autocomplete="off" spellcheck="false" placeholder="Enter date introduction" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agenda" class="col-sm-2 col-form-label fw-bold">Agenda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="agenda" name="agenda" autocomplete="off"
                            spellcheck="false" placeholder="Enter agenda introduction" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC introduction" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="feedback" class="col-sm-2 col-form-label fw-bold">Feedback</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="feedback" name="feedback" placeholder="Enter feedback customer of introduction"
                            rows="4" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Introduction</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result introduction" rows="4"
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
                        <th scope="col">Date Introduction</th>
                        <th scope="col">Name Company</th>
                        <th scope="col">Agenda</th>
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
                ajax: '{!! route('introduction.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'date_introduction',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'agenda',
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
