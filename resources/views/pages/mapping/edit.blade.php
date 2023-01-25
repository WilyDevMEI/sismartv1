@extends('layouts.dashboard', ['title' => 'Menu Mapping', 'state' => 'marketing', 'page' => 'mapping'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mapping.index') }}">Mapping</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <h2>Menu Edit</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('mapping.update', $mapping->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Mapping</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $mapping->konsumen_id }}>
                                    {{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_mapping" class="col-sm-2 col-form-label fw-bold">Tanggal Mapping</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_mapping" name="date_mapping" autocomplete="off"
                            spellcheck="false" placeholder="Enter date mapping"
                            value="{{ $mapping->date_mapping->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mileage" class="col-sm-2 col-form-label fw-bold">Jarak Tempuh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mileage" name="mileage" autocomplete="off"
                            spellcheck="false" placeholder="Enter mileage to customer" value="{{ $mapping->mileage }}"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="term_mapping" class="col-sm-2 col-form-label fw-bold">Lama Mapping</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="term_mapping" name="term_mapping" autocomplete="off"
                            spellcheck="false" placeholder="Enter term of mapping" value="{{ $mapping->term_mapping }}"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Mapping</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC" value="{{ $mapping->pic }}" required>
                    </div>
                </div>
                <h3 class="text-muted my-3 my-sm-5">Result Mapping</h3>
                <div class="row mb-3">
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="topic" name="topic" autocomplete="off"
                            spellcheck="false" placeholder="Enter topic" value="{{ $mapping->topic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Mapping</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result" rows="6" required>{{ $mapping->result }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
