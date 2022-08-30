<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Resepsionis</title>

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
                <a class="nav-link px-3" href="logout">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Daftar Client
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="tabel-reservasi">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Status</th>
                                <th scope="col">Nama Client</th>
                                <th scope="col">Tipe Kamar</th>
                                <th scope="col">Jumlah Kamar</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Proses</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($reservasi as $item)
                                <tr class="text-center">
                                    <td style="vertical-align: middle">
                                        @if ($item->status == 'Checkin')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Checkout')
                                            <span class="badge bg-info">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Dalam Proses')
                                            <span class="badge bg-warning">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Dibatalkan')
                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{ $item->client->nama }}</td>
                                    <td style="vertical-align: middle">
                                        {{ $item->kamar->jeniskamar->jeniskamar }}</td>
                                    <td style="vertical-align: middle">{{ $item->jumlahKamar }}</td>
                                    <td style="vertical-align: middle">{{ $item->mulai }}</td>
                                    <td style="vertical-align: middle">{{ $item->selesai }}</td>
                                    <td><a href="/resepsionis/proses/{{ $item->id }}" class="btn px-2"><img
                                                src="{{ asset('bootstrap/icon/clipboard-check.svg') }}" alt=""></a>
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
        const tabel = document.querySelector('#tabel-reservasi');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>

</body>

</html>
