@extends('layouts.dashboard', ['title' => 'Detail Produk & Jasa', 'state' => 'product', 'page' => 'product'])
@section('content')
    <section id="detail-konsumen">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk & Jasa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <h2>Detail Produk & Jasa</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <form action="{{ route('product.update', $product->id) }}" method="POST" class="needs-validation" novalidate>
                @method('PUT')
                @csrf
                <h3 class="text-muted mb-4">Customer Information</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}"
                                    {{ $konsumen->id == $product->konsumen_id ? 'selected' : '' }}>
                                    {{ $konsumen->name_company }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">P I C</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter name PIC" value="{{ $product->pic }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off"
                            spellcheck="false" placeholder="Enter phone number PIC" value="{{ $product->phone }}" required>
                    </div>
                </div>
                <h3 class="text-muted mt-5 mb-4">Requirement</h3>
                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label fw-bold">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category" id="category" required>
                            <option value="Produk" {{ $product->category == 'Produk' ? 'selected' : ' ' }}>Produk</option>
                            <option value="Jasa" {{ $product->category == 'Jasa' ? 'selected' : ' ' }}>Jasa</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="necessity" class="col-sm-2 col-form-label fw-bold">Kebutuhan</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="necessity" id="necessity" required>
                            <option value="General Chemical"
                                {{ $product->necessity == 'General Chemical' ? 'selected' : '' }}>General Chemical</option>
                            <option value="Chemical Specialty"
                                {{ $product->necessity == 'Chemical Specialty' ? 'selected' : '' }}>Chemical Specialty
                            </option>
                            <option value="Service Boiler" {{ $product->necessity == 'Service Boiler' ? 'selected' : '' }}>
                                Service Boiler</option>
                            <option value="Cooling Boiler" {{ $product->necessity == 'Cooling Boiler' ? 'selected' : '' }}>
                                Cooling Boiler</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name_necessity" class="col-sm-2 col-form-label fw-bold">Nama Produk/Jasa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_necessity" name="name_necessity"
                            autocomplete="off" spellcheck="false" placeholder="Enter name product or services"
                            value="{{ $product->name_necessity }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="qty" class="col-sm-2 col-form-label fw-bold">QTY</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="qty" name="qty" autocomplete="off"
                            spellcheck="false" placeholder="Enter quantity of requirement" value="{{ $product->qty }}"
                            required>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="detail" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detail" name="detail" placeholder="Enter detail" rows="6" required>{{ $product->detail }}</textarea>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="sales" class="col-sm-2 col-form-label fw-bold">Sales MITO</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sales" name="sales" autocomplete="off"
                            spellcheck="false" placeholder="Enter sales PIC Mito" value="{{ $product->sales }}"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </section>
@endsection
