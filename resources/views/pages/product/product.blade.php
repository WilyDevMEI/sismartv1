@extends('layouts.dashboard', ['title' => 'Data Produk & Jasa', 'state' => 'product', 'page' => 'product'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product & Jasa</li>
            </ol>
        </nav>
        <h2>Halaman Produk & Jasa</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('product.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">Customer Information</h3>
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
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">P I C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter name PIC" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off"
                            spellcheck="false" placeholder="Enter phone number PIC" required>
                    </div>
                </div>
                <h3 class="text-muted mt-5 mb-4">Requirement</h3>
                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label fw-bold">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category" id="category" required>
                            <option selected value="">Select category...</option>
                            <option value="Produk">Produk</option>
                            <option value="Jasa">Jasa</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="necessity" class="col-sm-2 col-form-label fw-bold">Kebutuhan</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="necessity" id="necessity" required>
                            <option selected value="">Select requirement...</option>
                            <option value="General Chemical">General Chemical</option>
                            <option value="Chemical Specialty">Chemical Specialty</option>
                            <option value="Service Boiler">Service Boiler</option>
                            <option value="Cooling Boiler">Cooling Boiler</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name_necessity" class="col-sm-2 col-form-label fw-bold">Nama Produk/Jasa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_necessity" name="name_necessity"
                            autocomplete="off" spellcheck="false" placeholder="Enter name product or services" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="qty" class="col-sm-2 col-form-label fw-bold">QTY</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="qty" name="qty" autocomplete="off"
                            spellcheck="false" placeholder="Enter quantity of requirement" required>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="detail" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detail" name="detail" placeholder="Enter detail" rows="6" required></textarea>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="sales" class="col-sm-2 col-form-label fw-bold">Sales MITO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sales" name="sales" autocomplete="off"
                            spellcheck="false" placeholder="Enter sales PIC Mito" required>
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
                        <th scope="col">Name Company</th>
                        <th scope="col">PIC Customer</th>
                        <th scope="col">Necessity</th>
                        <th scope="col">Name Necessity</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Sales</th>
                        <th scope="col" class="w-25">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->konsumen->name_company }}</td>
                            <td>{{ $product->pic }}</td>
                            <td>{{ $product->necessity }}</td>
                            <td>{{ $product->name_necessity }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->sales }}</td>
                            <td>hi</td>
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
            $('#data-section').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 25,
                pagingType: "simple_numbers",
                ajax: '{!! route('product.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'pic',
                    },
                    {
                        data: 'necessity',
                    },
                    {
                        data: 'name_necessity',
                        name: 'name_necessity'
                    },
                    {
                        data: 'qty',
                    },
                    {
                        data: 'sales',
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
