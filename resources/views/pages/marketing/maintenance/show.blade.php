@extends('layouts.dashboard', ['title' => 'Menu Detail Maintenance', 'state' => 'marketing', 'page' => 'maintenance'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('maintenance.index') }}">Maintenance</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
        <h2>Detail Maintenance</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Maintenance</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_maintenance" class="col-sm-2 col-form-label fw-bold">Tanggal maintenance</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->date_maintenance->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic_customer" class="col-sm-2 col-form-label fw-bold">PIC Konsumen</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->pic_customer }}</div>
            </div>
            <div class="row mb-3">
                <label for="agenda" class="col-sm-2 col-form-label fw-bold">Agenda</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->agenda }}</div>
            </div>
            <div class="row mb-3">
                <label for="type_maintenance" class="col-sm-2 col-form-label fw-bold">Kategori Maintenance</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->type_maintenance }}</div>
            </div>
            <div class="row mb-3">
                <label for="issue" class="col-sm-2 col-form-label fw-bold">Kendala</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->issue }}</div>
            </div>
            <div class="row mb-3">
                <label for="result_maintenance" class="col-sm-2 col-form-label fw-bold">Kesimpulan Maintenance</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->result_maintenance }}</div>
            </div>
            <div class="row my-5">
                <label for="pic_marketing" class="col-sm-2 col-form-label fw-bold">PIC Marketing</label>
                <div class="col-sm-10 col-form-label">{{ $maintenance->pic_marketing }}</div>
            </div>
        </div>
    </section>
@endsection
