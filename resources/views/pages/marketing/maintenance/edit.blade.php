@extends('layouts.dashboard', ['title' => 'Menu Edit Maintenance', 'state' => 'marketing', 'page' => 'maintenance'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('maintenance.index') }}">Maintenance</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
        <h2>Edit Maintenance</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('maintenance.update', $maintenance->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Maintenance</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $maintenance->konsumen_id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_maintenance" class="col-sm-2 col-form-label fw-bold">Tanggal maintenance</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_maintenance" name="date_maintenance"
                            autocomplete="off" spellcheck="false" value="{{ $maintenance->date_maintenance->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic_customer" class="col-sm-2 col-form-label fw-bold">PIC Konsumen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic_customer" name="pic_customer"
                            autocomplete="off" spellcheck="false" placeholder="Enter name of pic customer" value="{{ $maintenance->pic_customer }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agenda" class="col-sm-2 col-form-label fw-bold">Agenda</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="agenda" name="agenda"
                            autocomplete="off" spellcheck="false" placeholder="Enter agenda of maintenance" value="{{ $maintenance->agenda }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="type_maintenance" class="col-sm-2 col-form-label fw-bold">Kategori Maintenance</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="type_maintenance" name="type_maintenance" required>
                            <option value="Via Telepon" {{ $maintenance->type_maintenance == 'Via Telepon' ? 'selected' : '' }}>Via Telepon</option>
                            <option value="Kunjungan Ditempat" {{ $maintenance->type_maintenance == 'Kunjungan Ditempat' ? 'selected' : '' }}>Kunjungan Ditempat</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="issue" class="col-sm-2 col-form-label fw-bold">Kendala</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="issue" name="issue" placeholder="Enter issue" rows="6" required>{{ $maintenance->issue }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result_maintenance" class="col-sm-2 col-form-label fw-bold">Kesimpulan Maintenance</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result_maintenance" name="result_maintenance" placeholder="Enter result maintenance" rows="6"
                            required>{{ $maintenance->result_maintenance }}</textarea>
                    </div>
                </div>
                <div class="row my-5">
                    <label for="pic_marketing" class="col-sm-2 col-form-label fw-bold">PIC Marketing</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic_marketing" name="pic_marketing" autocomplete="off"
                            spellcheck="false" placeholder="Enter pic marketing mito" value="{{ $maintenance->pic_marketing }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
