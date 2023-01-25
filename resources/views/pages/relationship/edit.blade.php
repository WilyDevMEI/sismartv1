@extends('layouts.dashboard', ['title' => 'Menu Edit Relationship', 'state' => 'relationship', 'page' => 'relationship'])
@section('content')
    <section id="relationship-section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('relationship.index') }}">Relationship</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <h2>Edit Relationship</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('relationship.update', $relationship->id) }}" method="POST" class="needs-validation"
                novalidate>
                @method('PUT')
                @csrf
                <div class="row mb-sm-5 mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}"
                                    {{ $konsumen->id == $relationship->konsumen_id ? 'selected' : '' }}>
                                    {{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <h4 class="text-muted mb-4">Contract Information</h4>
                <div class="row mb-3">
                    <label for="po_number" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="po_number" name="po_number" autocomplete="off"
                            spellcheck="false" placeholder="Enter number PO" value="{{ $relationship->po_number }}"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_start" class="col-sm-2 col-form-label fw-bold">Tanggal Kontrak</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm">
                                <input type="date" class="form-control" id="date_start" name="date_start"
                                    title="Mulai Kontrak" value="{{ $relationship->date_start->format('Y-m-d') }}" required>
                            </div>
                            <div class="col-sm">
                                <input type="date" class="form-control" id="date_end" name="date_end"
                                    title="Berakhir Kontrak" value="{{ $relationship->date_end->format('Y-m-d') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="period_partnership" class="col-sm-2 col-form-label fw-bold">Lama Kerjasama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="period_partnership" name="period_partnership"
                            autocomplete="off" spellcheck="false" placeholder="Enter period of contract"
                            value="{{ $relationship->period_partnership }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="system_payment" class="col-sm-2 col-form-label fw-bold">Sistem Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="system_payment" name="system_payment"
                            autocomplete="off" spellcheck="false" placeholder="Enter system payment"
                            value="{{ $relationship->system_payment }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="desc_contract" class="col-sm-2 col-form-label fw-bold">Keterangan Kontrak</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="desc_contract" name="desc_contract" placeholder="Enter description contract"
                            rows="6" required>{{ $relationship->desc_contract }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </section>
@endsection
