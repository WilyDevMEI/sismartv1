@extends('layouts.dashboard', ['title' => 'Menu Detail Mapping', 'state' => 'marketing', 'page' => 'mapping'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mapping.index') }}">Mapping</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <h2>Detail Mapping</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Mapping</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_mapping" class="col-sm-2 col-form-label fw-bold">Tanggal Mapping</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->date_mapping }}</div>
            </div>
            <div class="row mb-3">
                <label for="mileage" class="col-sm-2 col-form-label fw-bold">Jarak Tempuh</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->mileage }}</div>
            </div>
            <div class="row mb-3">
                <label for="term_mapping" class="col-sm-2 col-form-label fw-bold">Lama Mapping</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->term_mapping }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->pic }}</div>
            </div>
            <h3 class="text-muted my-3 my-sm-4">Result Mapping</h3>
            <div class="row mb-3">
                <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->topic }}</div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Mapping</label>
                <div class="col-sm-10 col-form-label">{{ $mapping->result }}</div>
            </div>
        </div>
    </section>
@endsection
