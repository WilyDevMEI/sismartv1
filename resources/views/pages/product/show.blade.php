@extends('layouts.dashboard', ['title' => 'Detail Produk & Jasa', 'state' => 'product', 'page' => 'product'])
@section('content')
    <section id="detail-konsumen">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk & Jasa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <h2>Detail Produk & Jasa</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Customer Information</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $product->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">P I C</label>
                <div class="col-sm-10 col-form-label">{{ $product->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                <div class="col-sm-10 col-form-label">{{ $product->phone }}</div>
            </div>
            <h3 class="text-muted mt-5 mb-4">Requirement</h3>
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label fw-bold">Kategori</label>
                <div class="col-sm-10 col-form-label">{{ $product->category }}</div>
            </div>
            <div class="row mb-3">
                <label for="necessity" class="col-sm-2 col-form-label fw-bold">Kebutuhan</label>
                <div class="col-sm-10 col-form-label">{{ $product->necessity }}</div>
            </div>
            <div class="row mb-3">
                <label for="name_necessity" class="col-sm-2 col-form-label fw-bold">Nama Produk/Jasa</label>
                <div class="col-sm-10 col-form-label">{{ $product->name_necessity }}</div>
            </div>
            <div class="row mb-3">
                <label for="qty" class="col-sm-2 col-form-label fw-bold">QTY</label>
                <div class="col-sm-10 col-form-label">{{ $product->qty }}</div>
            </div>
            <div class="row mb-5">
                <label for="detail" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                <div class="col-sm-10 col-form-label">{{ $product->detail }}</div>
            </div>
            <div class="row mb-5">
                <label for="sales" class="col-sm-2 col-form-label fw-bold">Sales MITO</label>
                <div class="col-sm-10 col-form-label">{{ $product->sales }}</div>
            </div>
        </div>
    </section>
@endsection
