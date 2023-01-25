@extends('layouts.dashboard', ['title' => 'Data Produk Deal', 'state' => 'marketing', 'page' => 'deal'])
@section('content')
    <section id="detail_product_plantest">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('deal.index') }}">Deal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
        <h2>Detail Product Deal</h2>

        <div class="wrapper-form bg-white p-md-5 p-3 rounded-4 mt-5 mb-sm-5 mb-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hola</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3 class="text-muted mb-3">Data Plantest</h3>
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal"
                data-bs-target="#addNewProduct">
                Add Product
            </button>

            <!-- Modal add product-->
            <form action="{{ route('dealproduct.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal fade" id="addNewProduct" tabindex="-1"
                    aria-labelledby="addNewProduct" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">New Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="{{$deal->id}}" name="ref_id">
                                <div class="mb-3">
                                    <label for="name_product" class="form-label">Name Product</label>
                                    <input type="text" class="form-control" id="name_product" name="name_product"
                                        placeholder="Enter a name product" autocomplete="off" spellcheck="false" required>
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY Product</label>
                                    <input type="text" class="form-control" id="qty" name="qty"
                                        placeholder="Enter qty product" autocomplete="off" spellcheck="false" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price Product</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Enter price product" autocomplete="off" spellcheck="false" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deal->dealable as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name_product }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}</td>
                                <td class="d-flex">
                                    <!-- Button edit product plantest -->
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#editDealProduct-{{ $item->id }}">
                                        Edit
                                    </button>

                                    <!-- Modal edit product-->
                                    <form action="{{ route('dealproduct.update', $item->id) }}" method="POST"
                                        class="needs-validation" novalidate>
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade" id="editDealProduct-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Product</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name_product" class="form-label">Name
                                                                Product</label>
                                                            <input type="text" class="form-control" id="name_product"
                                                                name="name_product" placeholder="Enter a name product"
                                                                value="{{ $item->name_product }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="qty" class="form-label">QTY Product</label>
                                                            <input type="text" class="form-control" id="qty"
                                                                name="qty" placeholder="Enter qty product"
                                                                value="{{ $item->qty }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price Product</label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price" placeholder="Enter qty product"
                                                                value="{{ $item->price }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="{{ route('dealproduct.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
