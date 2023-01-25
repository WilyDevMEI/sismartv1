@extends('layouts.dashboard', ['title' => 'Menu Quotation', 'state' => 'marketing', 'page' => 'quotation'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quotation</li>
            </ol>
        </nav>
        <h2>Menu Quotation</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('quotation.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">New Quotation</h3>
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
                    <label for="date_quotation" class="col-sm-2 col-form-label fw-bold">Tanggal Penawaran</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_quotation" name="date_quotation"
                            autocomplete="off" spellcheck="false" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Quotation</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="system_payment" name="system_payment"
                            autocomplete="off" spellcheck="false" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name_product" class="col-sm-2 col-form-label fw-bold">Nama Produk</label>
                    <div class="col-sm-10" id="col-wrap-product">
                        <div class="row g-3 mb-3" id="row-wrap-product">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" placeholder="Enter a name product" id="name_product" name="name_product[]" autocomplete="off" spellcheck="false" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" placeholder="Enter qty" name="qty[]" autocomplete="off" spellcheck="false" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" placeholder="Enter price" name="price[]" autocomplete="off" spellcheck="false" required>
                            </div>
                            <div class="col-sm">
                                <a id="add-product" class="btn btn-outline-primary w-100" role="button">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Hasil Penawaran</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result quotation" rows="6" required></textarea>
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
                        <th scope="col">Date Quotation</th>
                        <th scope="col">Name Company</th>
                        <th scope="col">PIC</th>
                        <th scope="col">Product</th>
                        <th scope="col" class="w-25">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
@endsection

@push('script')
    <script type="text/javascript">
        var i = 0;
        $("#add-product").click(function() {
            ++i;
            $("#row-wrap-product").append('<div class="row g-3 mb-0" id="row-wrap-remove"><div class="col-sm-5"><input type="text" class="form-control" placeholder="Enter a name product" name="name_product[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><input type="text" class="form-control" placeholder="Enter qty" name="qty[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><input type="text" class="form-control" placeholder="Enter price" name="price[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><a id="remove-product" class="btn btn-outline-danger" role="button">Remove</a></div></div>');
        });
        $(document).on('click', '#remove-product', function() {
            $(this).parents('#row-wrap-remove').remove();
        });
    </script>
@endpush

@push('script')
<script>
        $(document).ready(function() {
            $('#data-section').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 25,
                pagingType: "simple_numbers",
                ajax: '{!! route('quotation.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'date_quotation',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'pic',
                    },
                    {
                        data: 'product',
                        render : function ( data, type, row, meta ) {
                        return '<a href="'+ data.link+ '" class="btn btn-sm btn-outline-primary btn-show" role="button">Show Product</a>';
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
