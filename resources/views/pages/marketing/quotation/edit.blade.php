@extends('layouts.dashboard', ['title' => 'Menu Edit Quotation', 'state' => 'marketing', 'page' => 'quotation'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}">Quotation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2>Edit Quotation</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('quotation.update', $quotation->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Quotation</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $quotation->konsumen_id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_quotation" class="col-sm-2 col-form-label fw-bold">Tanggal Penawaran</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_quotation" name="date_quotation"
                            autocomplete="off" spellcheck="false" value="{{ $quotation->date_quotation->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Quotation</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" value="{{ $quotation->pic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="system_payment" name="system_payment"
                            autocomplete="off" spellcheck="false" value="{{ $quotation->system_payment }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Hasil Penawaran</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result quotation" rows="6" required>{{ $quotation->result }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
