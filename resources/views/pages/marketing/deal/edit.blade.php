@extends('layouts.dashboard', ['title' => 'Menu Edit Deal', 'state' => 'marketing', 'page' => 'deal'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('deal.index') }}">Deal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <h2>Menu Edit Deal</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('deal.update', $deal->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Data Deal</h3>
                <div class="row mb-3">
                    <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_po" name="number_po"
                            autocomplete="off" spellcheck="false" placeholder="Enter number po" value="{{ $deal->number_po }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_deal" class="col-sm-2 col-form-label fw-bold">Tanggal Deal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_deal" name="date_deal"
                            autocomplete="off" spellcheck="false" value="{{ $deal->date_deal->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $deal->konsumen_id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="topic" name="topic" autocomplete="off"
                            spellcheck="false" placeholder="Enter topic deal" value="{{ $deal->topic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC deal" value="{{ $deal->pic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Deal</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result deal" rows="4" title="Result deal"
                            required>{{ $deal->result }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
