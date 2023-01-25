@extends('layouts.dashboard', ['title' => 'Menu Detail Relationship', 'state' => 'relationship', 'page' => 'relationship'])
@section('content')
    <section id="relationship-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('relationship.index') }}">Relationship</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>

        <h2>Detail Relationship</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">

            <div class="row mb-sm-5 mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $relationship->konsumen->name_company }}</div>
            </div>
            <h4 class="text-muted mb-4">Contract Information</h4>
            <div class="row mb-3">
                <label for="po_number" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                <div class="col-sm-10 col-form-label">{{ $relationship->po_number }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_start" class="col-sm-2 col-form-label fw-bold">Tanggal Kontrak</label>
                <div class="col-sm-10">
                    <div class="row g-3">
                        <div class="col-sm col-form-label">{{ $relationship->date_start->format('d F Y') }}</div>
                        <div class="col-sm col-form-label fw-bold">s/d</div>
                        <div class="col-sm col-form-label">{{ $relationship->date_end->format('d F Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="period_partnership" class="col-sm-2 col-form-label fw-bold">Lama Kerjasama</label>
                <div class="col-sm-10 col-form-label">{{ $relationship->period_partnership }}</div>
            </div>
            <div class="row mb-3">
                <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                <div class="col-sm-10 col-form-label">{{ $relationship->system_payment }}</div>
            </div>
            <div class="row mb-3">
                <label for="desc_contract" class="col-sm-2 col-form-label fw-bold">Keterangan Kontrak</label>
                <div class="col-sm-10 col-form-label">{{ $relationship->desc_contract }}</div>
            </div>
        </div>
    </section>
@endsection
