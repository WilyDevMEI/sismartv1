@extends('layouts.dashboard', ['title' => 'Data Konsumen', 'state' => 'konsumen', 'page' => 'konsumen'])
@section('content')
    <section id="konsumen">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konsumen</li>
            </ol>
        </nav>
        <h2>Halaman Konsumen</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('konsumen.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">Company Information</h3>
                <div class="row mb-3">
                    <label for="name_company" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_company" name="name_company"
                            placeholder="Enter name company" autocomplete="off" spellcheck="false" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="owner" class="col-sm-2 col-form-label fw-bold">Owner</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="owner" name="owner" autocomplete="off"
                            spellcheck="false" placeholder="Enter name owner company" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label fw-bold">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            spellcheck="false" placeholder="Enter email company" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label fw-bold">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off"
                            spellcheck="false" placeholder="Enter phone number PIC company" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label fw-bold">Alamat</label>
                    <div class="col-sm-10">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Enter address company"
                                    aria-label="Address" id="address" name="address" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" placeholder="Enter City" name="city"
                                    autocomplete="off" spellcheck="false" aria-label="City" required>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" placeholder="Enter Country" name="country"
                                    autocomplete="off" spellcheck="false" aria-label="Country" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description_company" class="col-sm-2 col-form-label fw-bold">Deskripsi Perusahaan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description_company" name="description_company"
                            placeholder="Enter description company" rows="6" required></textarea>
                    </div>
                </div>
                <h3 class="text-muted mt-5 mb-4">Additional Information</h3>
                <div class="row mb-3">
                    <label for="type_customer" class="col-sm-2 col-form-label fw-bold">Tipe Konsumen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="type_customer" name="type_customer"
                            autocomplete="off" spellcheck="false" placeholder="Enter type customer" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deed_number" class="col-sm-2 col-form-label fw-bold">Nomor Akta</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deed_number" name="deed_number"
                            autocomplete="off" spellcheck="false" placeholder="Enter deed number customer" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pkp" class="col-sm-2 col-form-label fw-bold">PKP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pkp" name="pkp" autocomplete="off"
                            spellcheck="false" placeholder="Enter PKP customer" required>
                    </div>
                </div>
                <div class="row mb-5">
                    <label for="npwp" class="col-sm-2 col-form-label fw-bold">NPWP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npwp" name="npwp" autocomplete="off"
                            spellcheck="false" placeholder="Enter NPWP customer" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>

        <section id="data">
            <div class="wrapper-list-data customer-existing p-sm-5 p-3 bg-white rounded-4">
                <table id="data-section" class="table table-striped nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Company</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col" class="w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsumens as $konsumen)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $konsumen->name_company }}</td>
                                <td>{{ $konsumen->owner }}</td>
                                <td>{{ $konsumen->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#data-section').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 25,
                pagingType: "simple_numbers",
                ajax: '{!! route('konsumen.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'owner',
                    },
                    {
                        data: 'phone',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });
        });
    </script>
@endpush
