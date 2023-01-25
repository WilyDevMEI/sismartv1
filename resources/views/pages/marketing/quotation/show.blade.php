@extends('layouts.dashboard', ['title' => 'Detail Quotation', 'state' => 'marketing', 'page' => 'quotation'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}">Quotation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h2>Detail Quotation</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Quotation</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $quotation->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_quotation" class="col-sm-2 col-form-label fw-bold">Tanggal Penawaran</label>
                <div class="col-sm-10 col-form-label">{{ $quotation->date_quotation->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Quotation</label>
                <div class="col-sm-10 col-form-label">{{ $quotation->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                <div class="col-sm-10">{{ $quotation->system_payment }}</div>
            </div>
            <div class="row mb-3">
                <label for="name_product" class="col-sm-2 col-form-label fw-bold">Nama Produk</label>
                <div class="col-sm-10">
                    <div class="row g-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotation->quotationable as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name_product }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Hasil Penawaran</label>
                <div class="col-sm-10 col-form-labe">{{ $quotation->result }}</div>
            </div>
        </div>
    </section>
@endsection
