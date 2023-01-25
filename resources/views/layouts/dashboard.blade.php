<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    @vite(['resources/js/app.js'])
    <!-- ICON CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- END ICON CDN --}}

    {{-- CSS DATATABLES --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- END CSS DATATABLES --}}
</head>

<body>

    <!-- SIDEBAR -->
    <div id="overlay" class="overlay-background"></div>
    <section id="sidebar">
        <div class="brand">SIMMEI</div>
        <div class="nav-menu">
            <a href="{{ route('index') }}" class="nav-link fw-bold mb-2 {{ $page == 'dashboard' ? 'active' : '' }}"><i
                    class='bx bx-sm bxs-dashboard icon'></i>Dashboard</a>
            <div class="divider mt-4 mb-2">Main Dashboard</div>
            <a href="{{ route('konsumen.index') }}"
                class="nav-link fw-bold mb-2 {{ $page == 'konsumen' ? 'active' : '' }}"><i
                    class='bx bx-sm bxs-user-rectangle icon'></i>Konsumen</a>
            <a href="{{ route('product.index') }}"
                class="nav-link fw-bold mb-2 {{ $page == 'product' ? 'active' : '' }}"><i
                    class='bx bx-sm bxs-data icon'></i>Produk & Jasa</a>
            <a href="{{ route('relationship.index') }}"
                class="nav-link fw-bold mb-2 {{ $page == 'relationship' ? 'active' : '' }}"><i
                    class='bx bx-sm bxs-share-alt icon'></i>Relationship</a>
            <!-- BUTTON COLLAPSE MARKETING -->
            <a class="nav-link btn-collapse fw-bold mb-1" data-bs-toggle="collapse" href="#" data-bs-target="#collapseMarketing"
                role="button" aria-expanded="{{ $state == 'marketing' ? 'true' : 'false' }}">
                <i class='bx bx-sm bxs-cabinet icon'></i>
                Marketing
                <i class='bx bx-sm bx-chevron-right ms-auto arrow-icon'></i>
            </a>
            <!-- END BUTTON COLLAPSE MARKETING -->
            <div class="wrapper-collapse
                collapse {{ $state == 'marketing' ? 'show' : '' }}"
                id="collapseMarketing">
                <a href="{{ route('mapping.index') }}" class="{{ $page == 'mapping' ? 'active' : '' }}">Mapping</a>
                <a href="{{ route('introduction.index') }}"
                    class="{{ $page == 'introduction' ? 'active' : '' }}">Introduction</a>
                <a href="{{ route('penetration.index') }}"
                    class="{{ $page == 'penetration' ? 'active' : '' }}">Penetrasi</a>
                <a href="{{ route('plantest.index') }}" class="{{ $page == 'plantest' ? 'active' : '' }}">Plantest</a>
                <a href="{{ route('quotation.index') }}" class="{{ $page == 'quotation' ? 'active' : '' }}">Quotation</a>
                <a href="{{ route('deal.index') }}" class="{{ $page == 'deal' ? 'active' : '' }}">Deal</a>
                <a href="{{ route('supplies.index') }}" class="{{ $page == 'supply' ? 'active' : '' }}">Supply</a>
                <a href="{{ route('maintenance.index') }}" class="{{ $page == 'maintenance' ? 'active' : '' }}">Maintenance</a>
            </div>
            <!-- BUTTON COLLAPSE TEKNISI -->
            <a class="nav-link btn-collapse fw-bold my-1" data-bs-toggle="collapse" href="#" data-bs-target="#collapseTeknisi"
                role="button" aria-expanded="false">
                <i class='bx bx-sm bxs-cabinet icon'></i>
                Teknisi
                <i class='bx bx-sm bx-chevron-right arrow-icon ms-auto'></i>
            </a>
            <!-- END BUTTON COLLAPSE TEKNISI -->
            <div class="wrapper-collapse collapse" id="collapseTeknisi">
                <a href="#">Jar Test</a>
                <a href="#">Presentasi</a>
                <a href="#">Maintenance Teknisi</a>
                <a href="#">Kondisi</a>
            </div>
            <div class="divider mt-4 mb-2">Authenticate</div>
            {{-- BUTTON USER --}}
            <a class="nav-link btn-collapse fw-bold my-1" data-bs-toggle="collapse" href="#" data-bs-target="#collapseUser"
                role="button" aria-expanded="{{ $state == 'user' ? 'true' : 'false' }}">
                <i class='bx bx-sm bxs-user icon'></i>
                Data User
                <i class='bx bx-sm bx-chevron-right arrow-icon ms-auto'></i>
            </a>
            <!-- END BUTTON COLLAPSE USER -->
            <div class="wrapper-collapse collapse {{ $state == 'user' ? 'show' : '' }}" id="collapseUser">
                <a href="{{ route('user.index') }}" class="{{ $page == 'user' ? 'active' : '' }}">User</a>
                <a href="{{ route('role.index') }}" class="{{ $page == 'role' ? 'active' : '' }}">Role</a>
                <a href="#">Permission</a>
            </div>
        </div>
    </section>
    <!-- END SIDEBAR -->

    <!-- MAIN CONTENT -->
    <section id="content">
        <div class="topbar">
            <!-- BUTTON COLLAPSE TOPBAR -->
            <button id="btn-topbar" class="btn my-auto text-black">
                <i class="bi bi-list"></i>
            </button>
            <!-- END BUTTON COLLAPSE TOPBAR -->

            <!-- PROFILE TOPBAR -->
            <div class="ms-auto d-flex">
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                        data-bs-offset="0,10">
                        <img src="https://xsgames.co/randomusers/avatar.php?g=female"
                            class="rounded-circle border border-2 border-primary me-2" style="width: 40px;"
                            alt="Avatar" />
                        Hi, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li><a class="dropdown-item" href="#">Change Password</a></li>
                        <li><a class="dropdown-item" href="#">Task Manager</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                        <form action="{{ route('logout') }}" method="POST" class="px-2">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 text-start" onclick="logOutConfirm()">Keluar</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END PROFILE TOPBAR -->
        </div>
        <div class="main-content">
            <div class="container-fluid p-md-5 p-3">
                @yield('content')
            </div>
        </div>
    </section>
    {{-- DATATABLES --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')
    <script>
        function ConfirmDelete() {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Hapus data ini ?',
                text: 'Klik batal jika tidak ingin menghapus data ini',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    Swal.fire(
                            'Berhasil Menghapus👍',
                            'Data berhasil dihapus',
                            'success'
                    ),
                    form.submit();
                }
            });
        }
        function logOutConfirm() {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Logout ?',
                text: 'Anda akan keluar dari aplikasi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((willLogout) => {
                if (willLogout.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

</body>

</html>
