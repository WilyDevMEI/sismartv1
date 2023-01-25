@extends('layouts.dashboard', ['title' => 'Menu Mapping', 'state' => 'marketing', 'page' => 'mapping'])
@section('content')
    <section id="mapping">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mapping</li>
            </ol>
        </nav>

        <h2>Halaman Mapping</h2>
        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('mapping.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <h3 class="text-muted mb-4">New Mapping</h3>
                <div class="row mb-3">
                    <label for="konsumen_id" class="col-sm-2 col-form-label fw-bold">Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="konsumen_id" name="konsumen_id" required>
                            <option selected value="">Select customer...</option>
                            @foreach ($konsumens as $konsumen)
                                <option value="{{ $konsumen->id }}">{{ $konsumen->name_company }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_mapping" class="col-sm-2 col-form-label fw-bold">Tanggal Mapping</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date_mapping" name="date_mapping" autocomplete="off"
                            spellcheck="false" placeholder="Enter date mapping" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mileage" class="col-sm-2 col-form-label fw-bold">Jarak Tempuh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mileage" name="mileage" autocomplete="off"
                            spellcheck="false" placeholder="Enter mileage to customer" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="term_mapping" class="col-sm-2 col-form-label fw-bold">Lama Mapping</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="term_mapping" name="term_mapping" autocomplete="off"
                            spellcheck="false" placeholder="Enter term of mapping" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pic" class="col-sm-2 col-form-label fw-bold">PIC Mapping</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pic" name="pic" autocomplete="off"
                            spellcheck="false" placeholder="Enter PIC" required>
                    </div>
                </div>
                <h3 class="text-muted my-3 my-sm-5">Result Mapping</h3>
                <div class="row mb-3">
                    <label for="topic" class="col-sm-2 col-form-label fw-bold">Topik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="topic" name="topic" autocomplete="off"
                            spellcheck="false" placeholder="Enter topic" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="result" class="col-sm-2 col-form-label fw-bold">Kesimpulan Mapping</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="result" name="result" placeholder="Enter result" rows="6" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>

            {{-- <div class="test my-5" id="dynamicWrap">
                <div class="input-group mb-3">
                    <input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject"
                        class="form-control" />
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah
                        Baru</button>
                </div>
            </div> --}}
        </div>

        <section id="data">
            <div class="wrapper-list-data p-sm-5 p-3 bg-white rounded-4">
                <table id="data-section" class="table table-striped nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date Mapping</th>
                            <th scope="col">Name Company</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Time</th>
                            <th scope="col">PIC</th>
                            <th scope="col" class="w-25">Action</th>
                        </tr>
                    </thead>
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
                ajax: '{!! route('mapping.index') !!}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'date_mapping',
                    },
                    {
                        data: 'name_company',
                    },
                    {
                        data: 'topic',
                    },
                    {
                        data: 'term_mapping',
                    },
                    {
                        data: 'pic',
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
{{-- @push('script')
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicWrap").append(
                '<div class="input-group mb-3"><input type="text" name="addMoreInputFields[]" class="form-control" placeholder="Enter name another PIC"/></div>'
            );
            // <tr><td><input type="text" name="addMoreInputFields[' + i +
            //     '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            // )
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush --}}
