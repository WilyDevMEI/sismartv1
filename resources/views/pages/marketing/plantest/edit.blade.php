@extends('layouts.dashboard', ['title' => 'Menu Edit Data Plantest', 'state' => 'marketing', 'page' => 'plantest'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('plantest.index') }}">Plantest</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2>Edit Data Plantest</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('plantest.update', $plantest->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Plantest</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $plantest->konsumen_id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_plantest" class="col-sm-2 col-form-label fw-bold">Tanggal Plantest</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_plantest" name="date_plantest" value="{{ $plantest->date_plantest->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Plantest</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" value="{{ $plantest->pic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="period_plantest" class="col-sm-2 col-form-label fw-bold">Lama Plantest</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="period_plantest" name="period_plantest"
                            autocomplete="off" spellcheck="false" value="{{ $plantest->period_plantest }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Hasil Plantest</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result " rows="6" required>{{ $plantest->result }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </section>
@endsection
