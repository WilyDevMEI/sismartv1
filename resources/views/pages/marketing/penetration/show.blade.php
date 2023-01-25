@extends('layouts.dashboard', ['title' => 'Menu Penetrasi', 'state' => 'marketing', 'page' => 'penetration'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('penetration.index') }}">Penetrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h2>Detail Penetrasi</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Penetration</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_penetration" class="col-sm-2 col-form-label fw-bold">Tanggal Penetrasi</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->date_penetration->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik Penetrasi</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->topic }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Penetrasi</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="issue" class="col-sm-2 col-form-label fw-bold">Kendala</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->issue }}</div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Penetrasi</label>
                <div class="col-sm-10 col-form-label">{{ $penetration->result }}</div>
            </div>
        </div>
    </section>
@endsection
