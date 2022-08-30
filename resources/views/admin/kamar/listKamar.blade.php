<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('../bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('../css/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Hotel Hebat</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ url('admin/logout') }}">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('admin/kamar') }}">
                                <span data-feather="file"></span>
                                List Kamar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ url('admin/jenis') }}">
                                <span data-feather="file"></span>
                                List Tipe Kamar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/fasilitas') }}">
                                List Fasilitas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/users') }}">
                                List Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">List Kamar</h1>
                    <a href="tambahKamar" class="btn btn-secondary" style="padding-top:3px"><strong>+</strong></a>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="tabel-kamar">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Gambar</th>
                                <th scope="col">Tipe Kamar</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kamar as $item)
                                <tr class="text-center">
                                    <td style="vertical-align: middle"><img
                                            src="{{ asset('images/kamar/' . $item->gambar) }}" height="60" width="80">
                                    </td>
                                    <td style="vertical-align: middle">{{ $item->jeniskamar->jeniskamar }}</td>
                                    <td style="vertical-align: middle">{{ $item->deskripsi }}</td>
                                    <td style="vertical-align: middle">{{ $item->harga }}</td>
                                    <td style="vertical-align: middle">{{ $item->stock }}</td>
                                    <td style="vertical-align: middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="/admin/kamar/edit/{{ $item->id }}" class="btn px-2"><img
                                                    src="{{ asset('../bootstrap/icon/pencil-fill.svg') }}"></a>
                                            <form action="/admin/kamar/{{ $item->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn px-2"><img
                                                        src="{{ asset('../bootstrap/icon/trash-fill.svg') }}"
                                                        alt=""></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>



    <script src="{{ asset('../bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../js/dashboard.js') }}"></script>
    <script src="{{ asset('../js/jquery.min.js') }}"></script>
    <script src="{{ asset('../js/simple-datatables.js') }}"></script>
    <script>
        const tabel = document.querySelector('#tabel-kamar');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>
</body>

</html>
