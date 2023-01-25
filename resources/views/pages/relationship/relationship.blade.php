@extends('layouts.dashboard', ['title' => 'Menu Relationship', 'state' => 'relationship', 'page' => 'relationship'])
@section('content')
    <section id="relationship-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Relationship</li>
            </ol>
        </nav>

        <h2>Halaman Relationship</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('relationship.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row mb-sm-5 mb-3">
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
                <h4 class="text-muted mb-4">Contract Information</h4>
                <div class="row mb-3">
                    <label for="po_number" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="po_number" name="po_number" autocomplete="off"
                            spellcheck="false" placeholder="Enter number PO" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_start" class="col-sm-2 col-form-label fw-bold">Tanggal Kontrak</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm">
                                <input type="date" class="form-control" id="date_start" name="date_start"
                                    title="Mulai Kontrak" required>
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" id="date_end" name="date_end"
                                    title="Berakhir Kontrak" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="period_partnership" class="col-sm-2 col-form-label fw-bold">Lama Kerjasama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="period_partnership" name="period_partnership"
                            autocomplete="off" spellcheck="false" placeholder="Enter period of contract" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="system_payment" name="system_payment"
                            autocomplete="off" spellcheck="false" placeholder="Enter system payment" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="desc_contract" class="col-sm-2 col-form-label fw-bold">Keterangan Kontrak</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="desc_contract" name="desc_contract" placeholder="Enter description contract"
                            rows="6" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>

        <section id="data">
            <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
                <table id="data-section" class="table table-striped nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Company</th>
                            <th scope="col">PO Number</th>
                            <th scope="col">Contract Start</th>
                            <th scope="col">Contract End</th>
                            <th scope="col">System Payment</th>
                            <th scope="col" class="w-25">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
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
                ajax: '{!! route('relationship.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'po_number',
                    },
                    {
                        data: 'date_start',
                    },
                    {
                        data: 'date_end',
                    },
                    {
                        data: 'system_payment',
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
