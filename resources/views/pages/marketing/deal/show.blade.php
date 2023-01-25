@extends('layouts.dashboard', ['title' => 'Menu Detail Deal', 'state' => 'marketing', 'page' => 'deal'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('deal.index') }}">Deal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <h2>Detail Deal</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Deal</h3>
            <div class="row mb-3">
                <label for="number_po" class="col-sm-2 col-form-label fw-bold">Nomor PO</label>
                <div class="col-sm-10 col-form-label">{{ $deal->number_po }}</div>
            </div>
            <div class="row mb-3">
                <label for="date_deal" class="col-sm-2 col-form-label fw-bold">Tanggal Deal</label>
                <div class="col-sm-10 col-form-label">{{ $deal->date_deal->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $deal->konsumen->name_company }}</div>
            </div>
            <div class="row mb-3">
                <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                <div class="col-sm-10 col-form-label">{{ $deal->topic }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC</label>
                <div class="col-sm-10 col-form-label">{{ $deal->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="name_product" class="col-sm-2 col-form-label fw-bold">Data Produk</label>
                <div class="col-sm-10">
                    <div class="row g-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deal->dealable as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name_product }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Deal</label>
                <div class="col-sm-10 col-form-label">{{ $deal->result }}</div>
            </div>
        </div>
    </section>
@endsection
