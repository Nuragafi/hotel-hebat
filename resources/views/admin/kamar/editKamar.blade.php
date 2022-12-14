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
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/kamar') }}">
                                List Kamar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href=" {{ url('admin/tipe') }}">
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
                    <h3 class="tittle">Edit Kamar</h3>
                </div>

                <form class="container" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tipe Kamar</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="autoSizingSelect" name="jeniskamar">
                                <option value="{{ $kamar->id_jeniskamar }}">{{ $kamar->jeniskamar->jeniskamar }}
                                </option>
                                @foreach ($jeniskamar as $item)
                                    <option value="{{ $item->id }}">{{ $item->jeniskamar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="deskripsi">{{ $kamar->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="passw" class="form-control" name="harga" value="{{ $kamar->harga }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="passw" class="form-control" name="stock" value="{{ $kamar->stock }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="gambar">
                            <input class=" form-control" type="hidden" name="gambarLama"
                                value="{{ $kamar->gambar }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>

            </main>
        </div>
    </div>



    <script src="{{ asset('../bootstrap/js/bootstrap.min.js') }}"></script>


    <script src="{{ asset('../js/dashboard.js') }}"></script>
</body>

</html>
