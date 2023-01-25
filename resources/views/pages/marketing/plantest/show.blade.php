@extends('layouts.dashboard', ['title' => 'Menu Plantest', 'state' => 'marketing', 'page' => 'plantest'])
@section('content')
    <section id="product">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('plantest.index') }}">Plantest</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h2>Detail Plantest</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            <h3 class="text-muted mb-4">Data Plantest</h3>
            <div class="row mb-3">
                <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                <div class="col-sm-10 col-form-label">{{ $plantest->konsumen->name_company }}</select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="date_plantest" class="col-sm-2 col-form-label fw-bold">Tanggal Plantest</label>
                <div class="col-sm-10 col-form-label">{{ $plantest->date_plantest->format('d F Y') }}</div>
            </div>
            <div class="row mb-3">
                <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Plantest</label>
                <div class="col-sm-10 col-form-label">{{ $plantest->pic }}</div>
            </div>
            <div class="row mb-3">
                <label for="period_plantest" class="col-sm-2 col-form-label fw-bold">Lama Plantest</label>
                <div class="col-sm-10 col-form-label">{{ $plantest->period_plantest }}</div>
            </div>
            <div class="row mb-3">
                <label for="name_product" class="col-sm-2 col-form-label fw-bold">Produk Plantest</label>
                <div class="col-sm-10" id="col-wrap-product">
                    <div class="row g-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantest->plantestable as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name_product }}</td>
                                        <td>{{ $item->qty }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="result" class="col-sm-2 col-form-label fw-bold">Hasil Plantest</label>
                <div class="col-sm-10 col-form-label">{{ $plantest->result }}</div>
            </div>
        </div>
    </section>
@endsection
