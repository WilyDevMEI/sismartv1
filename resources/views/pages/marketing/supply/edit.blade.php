@extends('layouts.dashboard', ['title' => 'Menu Edit Supply', 'state' => 'marketing', 'page' => 'supply'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supplies.index') }}">Supply</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2>Edit Data Supply</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('supplies.update', $supply->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Information Supply</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}" {{ $konsumen->id == $supply->konsumen_id ? 'selected' : '' }}>{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_po" name="number_po" autocomplete="off"
                            spellcheck="false" placeholder="Enter number PO" value="{{ $supply->number_po }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="number_do" class="col-sm-2 col-form-label fw-bold">No. Surat Jalan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="number_do" name="number_do" autocomplete="off"
                            spellcheck="false" placeholder="Enter number delivery order" value="{{ $supply->number_do }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_do" class="col-sm-2 col-form-label fw-bold">Tanggal DO</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_do" name="date_do" autocomplete="off"
                            spellcheck="false" placeholder="Enter date delivery order" value="{{ $supply->date_do->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC / Sales</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter name pic or sales" value="{{ $supply->pic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="expedition" class="col-sm-2 col-form-label fw-bold">Ekspedisi</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm-7">
                                <select class="form-select" id="expedition" name="expedition" required>
                                    <option value="Internal" {{ $supply->expedition == 'Internal' ? 'selected' : '' }}>Internal</option>
                                    <option value="Eksternal" {{ $supply->expedition == 'Eksternal' ? 'selected' : '' }}>Ekternal</option>
                                  </select>
                            </div>
                            <div class="col-sm">
                                <select class="form-select" name="type_customer" required>
                                    <option value="PKS" {{ $supply->type_customer == 'PKS' ? 'selected' : '' }}>PKS</option>
                                    <option value="PDAM" {{ $supply->type_customer == 'PDAM' ? 'selected' : '' }}>PDAM</option>
                                  </select>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="result_supply" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result_supply" name="result_supply" placeholder="Enter detail" rows="6" required>{{ $supply->result_supply }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
