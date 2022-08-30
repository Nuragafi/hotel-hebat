<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat</title>
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container-fluid" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 text-dark text-decoration-none ps-4">
                <span><img src="{{ asset('images/hotel.png') }}" alt="logo" width="50" height="50"></span>
            </a>

            <div class="nav-menu">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="" class="px-2 nav-link">home</a>
                    </li>
                    <li><a href="#fasilitas" class="px-2 nav-link">fasilitas</a></li>
                    <li><a href="#kamar" class="px-2 nav-link">kamar</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <form method="POST">
        <div class="d-flex justify-content-center">
            <div class="card" style="max-width: 740px;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ asset('images/kamar/' . $kamar->gambar) }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $kamar->jeniskamar->jeniskamar }}</strong></h5>
                            <p class="card-text">{{ $kamar->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="col-md-3" id="sewa">
                        <div class="card-body">
                            <h6>Harga</h6>
                            <span>Rp {{ $kamar->harga }}/Malam</span>
                        </div>
                    </div>
                    <div class="col-md-2" id="sewa">
                        <div class="card-body d-flex justify-content-center">
                            <Select name="jumlahKamar">
                                @for ($i = 1; $i <= $kamar->stock; $i++)
                                    <option value="{{ $i }}">{{ $i }} Kamar</option>
                                @endfor
                            </Select>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center mt-3">
            <div class="card">
                <h5 class="card-header bg-dark" style="color: white">Silahkan isi data</h5>
                <div class="card-body">
                    @csrf
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-6 form-floating">
                                <input type="date" class="form-control" required id="floatingInput"
                                    placeholder="Mulai" name="mulai">
                                <label for="floatingInput" class="px-4">Mulai</label>
                            </div>
                            <div class="col-6 form-floating">
                                <input type="date" class="form-control" required id="floatingInput"
                                    placeholder="Selesai" name="selesai">
                                <label for="floatingInput" class="px-4">Selesai</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" required id="floatingInput" placeholder="Nama"
                                name="nama">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" required id="floatingInput"
                                placeholder="Nomor Telepon" name="telpon">
                            <label for="floatingInput">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" required id="floatingInput" placeholder="Email"
                                name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/" class="btn btn-secondary mx-2">Batal</a>
                            <button type="submit" class="btn btn-dark">Pesan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- Bootstrap js -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
