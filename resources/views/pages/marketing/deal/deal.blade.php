@extends('layouts.dashboard', ['title' => 'Menu Deal', 'state' => 'marketing', 'page' => 'deal'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Deal</li>
            </ol>
        </nav>

        <h2>Menu Deal</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('deal.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">New Deal</h3>
                <div class="row mb-3">
                    <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_po" name="number_po"
                            autocomplete="off" spellcheck="false" placeholder="Enter number po" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_deal" class="col-sm-2 col-form-label fw-bold">Tanggal Deal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_deal" name="date_deal"
                            autocomplete="off" spellcheck="false" placeholder="Enter date deal" required>
                    </div>
                </div>
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
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="topic" name="topic" autocomplete="off"
                            spellcheck="false" placeholder="Enter topic deal" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC deal" required>
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
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Deal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result deal" rows="4" title="Result deal"
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
                        <th scope="col">No PO</th>
                        <th scope="col">Date Deal</th>
                        <th scope="col">Name Company</th>
                        <th scope="col" class="w-25">Topic</th>
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
            $("#row-wrap-product").append('<div class="row g-3 mb-0" id="row-wrap-remove"><div class="col-sm-5"><input type="text" class="form-control" placeholder="Enter a name product" name="name_product[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><input type="text" class="form-control" placeholder="Enter qty" name="qty[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><input type="text" class="form-control" placeholder="Enter price" name="price[]" autocomplete="off" spellcheck="false" required></div><div class="col-sm"><a id="remove-product" class="btn btn-outline-danger" role="button">Remove</a></div></div>');
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
                ajax: '{!! route('deal.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',

                    },
                    {
                        data: 'number_po',
                    },
                    {
                        data: 'date_deal',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'topic',
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
