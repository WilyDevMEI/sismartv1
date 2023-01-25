@extends('layouts.dashboard', ['title' => 'Menu Introduction', 'state' => 'marketing', 'page' => 'introduction'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('introduction.index') }}">Introduction</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <h2>Detail Introduction</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Introduction</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_introduction" class="col-sm-2 col-form-label fw-bold">Tanggal Introduction</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->date_introduction->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="agenda" class="col-sm-2 col-form-label fw-bold">Agenda</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->agenda }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="feedback" class="col-sm-2 col-form-label fw-bold">Feedback</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->feedback }}</div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Introduction</label>
                <div class="col-sm-10 col-form-label">{{ $introduction->result }}</div>
            </div>
        </div>
    </section>
@endsection
