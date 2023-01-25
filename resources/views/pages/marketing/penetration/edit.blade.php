@extends('layouts.dashboard', ['title' => 'Menu Penetrasi', 'state' => 'marketing', 'page' => 'penetration'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('penetration.index') }}">Penetrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2>Edit Penetrasi</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('penetration.update', $penetration->id) }}" method="POST" class="needs-validation"
                novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Penetration</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}"
                                    {{ $konsumen->id == $penetration->konsumen_id ? 'selected' : '' }}>
                                    {{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_penetration" class="col-sm-2 col-form-label fw-bold">Tanggal Penetrasi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_penetration" name="date_penetration"
                            autocomplete="off" spellcheck="false"
                            value="{{ $penetration->date_penetration->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik Penetrasi</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="topic" id="topic" required>
                            <option value="Produk" {{ $penetration->topic == 'Produk' ? 'selected' : '' }}>Produk</option>
                            <option value="Jasa" {{ $penetration->topic == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                            <option value="Produk & Jasa" {{ $penetration->topic == 'Produk & Jasa' ? 'selected' : '' }}>
                                Produk & Jasa</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Penetrasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC penetration" value="{{ $penetration->pic }}"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="issue" class="col-sm-2 col-form-label fw-bold">Kendala</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="issue" name="issue" placeholder="Enter issue" rows="6" required>{{ $penetration->issue }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Penetrasi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result penetration" rows="6"
                            required>{{ $penetration->result }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
