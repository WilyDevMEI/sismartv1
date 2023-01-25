@extends('layouts.dashboard', ['title' => 'Menu Detail Supply', 'state' => 'marketing', 'page' => 'supply'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supplies.index') }}">Supply</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h2>Detail Produk Supply</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Information Supply</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $supply->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                <div class="col-sm-10 col-form-label">{{ $supply->number_po }}</div>
            </div>
            <div class="row mb-3">
                <label for="number_do" class="col-sm-2 col-form-label fw-bold">No. Surat Jalan</label>
                <div class="col-sm-10 col-form-label">{{ $supply->number_do }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_do" class="col-sm-2 col-form-label fw-bold">Tanggal DO</label>
                <div class="col-sm-10 col-form-label">{{ $supply->date_do->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC / Sales</label>
                <div class="col-sm-10">{{ $supply->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="expedition" class="col-sm-2 col-form-label fw-bold">Ekspedisi</label>
                <div class="col-sm-10 col-form-label">{{ $supply->expedition }}</div>
            </div>
            <h3 class="text-muted mt-5 mb-4">Product Supply</h3>
            <div class="row mb-3">
                <label for="name_product" class="col-sm-2 col-form-label fw-bold">Nama Produk</label>
                <div class="col-sm-10" id="col-wrap-product">
                    <div class="row g-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supply->supplieable as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name_product }}</td>
                                            <td>{{ $item->qty }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <label for="result_supply" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                <div class="col-sm-10 col-form-label">{{ $supply->result_supply }}</div>
            </div>
        </div>
    </section>
@endsection
