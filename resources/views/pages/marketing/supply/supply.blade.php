@extends('layouts.dashboard', ['title' => 'Menu Supply', 'state' => 'marketing', 'page' => 'supply'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supply</li>
            </ol>
        </nav>
        <h2>Halaman Supply</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('supplies.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">Information Supply</h3>
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
                    <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_po" name="number_po" autocomplete="off"
                            spellcheck="false" placeholder="Enter number PO" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="number_do" class="col-sm-2 col-form-label fw-bold">No. Surat Jalan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_do" name="number_do" autocomplete="off"
                            spellcheck="false" placeholder="Enter number delivery order" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_do" class="col-sm-2 col-form-label fw-bold">Tanggal DO</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_do" name="date_do" autocomplete="off"
                            spellcheck="false" placeholder="Enter date delivery order" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC / Sales</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter name pic or sales" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="expedition" class="col-sm-2 col-form-label fw-bold">Ekspedisi</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm-7">
                                <select class="form-select" id="expedition" name="expedition" required>
                                    <option selected value="">Pilih Ekspedisi</option>
                                    <option value="Internal">Internal</option>
                                    <option value="Eksternal">Ekternal</option>
                                  </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="type_customer" required>
                                    <option selected value="">Pilih kategori</option>
                                    <option value="PKS">PKS</option>
                                    <option value="PDAM">PDAM</option>
                                  </select>
                            </div>
                          </div>
                    </div>
                </div>

                <h3 class="text-muted mt-5 mb-4">Product Supply</h3>
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
                                <a id="add-product" class="btn btn-outline-primary w-100" role="button">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="result_supply" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result_supply" name="result_supply" placeholder="Enter detail" rows="6" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>

    <section id="data">
        <div class="wrapper-list-data product-existing p-sm-5 p-3 bg-white rounded-4">
            <table id="data-section" class="table table-striped nowrap w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Customer</th>
                        <th scope="col">Number PO</th>
                        <th scope="col">Number DO</th>
                        <th scope="col">Date DO</th>
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
    <script>
        var i = 0;
        $("#add-product").click(function() {
            ++i;
            $("#row-wrap-product").append('<div class="row g-3 mb-0" id="row-wrap-remove"><div class="col-sm-5"><input type="text" class="form-control" placeholder="Enter a name product" name="name_product[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><input type="text" class="form-control" placeholder="Enter qty" name="qty[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><a id="remove-product" class="btn btn-outline-danger" role="button">Remove</a></div></div>');
        });
        $(document).on('click', '#remove-product', function() {
            $(this).parents('#row-wrap-remove').remove();
        });

        $(document).ready(function() {
            $('#data-section').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 25,
                pagingType: "simple_numbers",
                ajax: '{!! route('supplies.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',

                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'number_po',
                    },
                    {
                        data: 'number_do',
                    },
                    {
                        data: 'date_do',
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
