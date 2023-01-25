@extends('layouts.dashboard', ['title' => 'Detail Konsumen', 'state' => 'konsumen', 'page' => 'konsumen'])
@section('content')
    <section id="detail-konsumen">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('konsumen.index') }}">Konsumen</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <h2>Detail Konsumen</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Company Information</h3>
            <div class="row mb-3">
                <label for="name_company" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="owner" class="col-sm-2 col-form-label fw-bold">Owner</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->owner }}</div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label fw-bold">Email</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->email }}</div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                <div class="col-sm-10">{{ $konsuman->phone }}</div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label fw-bold">Alamat</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->address }}</div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label fw-bold">Kota/Kabupaten</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->city }}</div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label fw-bold">Negara</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->country }}</div>
            </div>
            <div class="row mb-3">
                <label for="description_company" class="col-sm-2 col-form-label fw-bold">Deskripsi Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->description_company }}</div>
            </div>
            <h3 class="text-muted mt-5 mb-4">Additional Information</h3>
            <div class="row mb-3">
                <label for="type_customer" class="col-sm-2 col-form-label fw-bold">Tipe Konsumen</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->type_customer }}</div>
            </div>
            <div class="row mb-3">
                <label for="deed_number" class="col-sm-2 col-form-label fw-bold">Nomor Akta</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->deed_number }}</div>
            </div>
            <div class="row mb-3">
                <label for="pkp" class="col-sm-2 col-form-label fw-bold">PKP</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->pkp }}</div>
            </div>
            <div class="row mb-5">
                <label for="npwp" class="col-sm-2 col-form-label fw-bold">NPWP</label>
                <div class="col-sm-10 col-form-label">{{ $konsuman->npwp }}</div>
            </div>
        </div>
    </section>
@endsection
