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
                        <a href="#" class="px-2 active nav-link"><b>home</b></a>
                    </li>
                    <li><a href="#fasilitas" class="px-2 nav-link">fasilitas</a></li>
                    <li><a href="#kamar" class="px-2 nav-link">kamar</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel/carousel-1.jpg') }}" class="d-block w-100" alt="..."
                    height="460px" width="100px" style="object-fit: cover" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/carousel-2.webp') }}" class="d-block w-100" alt="..."
                    height="460px" width="100px" style="object-fit: cover" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel/carousel-3.webp') }}" class="d-block w-100" alt="..."
                    height="460px" width="100px" style="object-fit: cover" />
            </div>
        </div>
        <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-flex justif-content-center mt-5 mb-5">
        <div class="text-center px-5" style="margin: 0 15rem 0 15rem">
            <h4 class="mb-3"><strong>Hotel Hebat</strong></h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum dicta enim facere odio officia, quibusdam
                neque laudantium laboriosam expedita adipisci inventore quas fugit, earum, necessitatibus
                exercitationem. Iusto dolorem nesciunt veritatis?</p>
            <a href="#kamar" class="btn btn-outline-dark mt-3 mb-5">Cek Kamar</a>
        </div>
    </div>

    <div class="container mt-5 mb-5" id="fasilitas">
        <div class="fasilitas">
            <div class="tittle text-center mb-3">
                <h4><strong>Fasilitas</strong></h4>
            </div>
            <div class="row mb-5">
                @foreach ($fasilitas as $item)
                    <div class="col-lg-4 text-center">
                        <img class="rounded-circle" src="{{ asset('images/fasilitas/' . $item->gambar) }}"
                            alt="gambar" width="210" height="210" style="object-fit: cover">
                        <h5 class="mt-4"><strong>{{ $item->fasilitas }}</strong></h5>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center mt-5 mb-5 align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="logo" height="300" width="300">
    </div>
    </div>


    <div class="container mb-5" id="kamar">
        <div class="kamar">
            <div class="tittle text-center mb-3">
                <h4><strong>Kamar</strong></h4>
            </div>
            <div class="row">
                @foreach ($kamar as $item)
                    <div class="col-4">
                        <a href="reservasi/{{ $item->id }}" class="link-dark" style="text-decoration:none">
                            <div class="card" style="height: 370px">
                                <img class="card-img-top" src="{{ asset('images/kamar/' . $item->gambar) }}"
                                    alt="gambar" style="height: 230px !important">
                                <div class="card-body">
                                    <div class="card-tittle row">
                                        <h6 class="col-6">
                                            <strong>{{ $item->jeniskamar->jeniskamar }}</strong>
                                        </h6>
                                        <p class="col-6 text-end">Rp {{ $item->harga }} /Malam</p>
                                    </div>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <!-- Bootstrap js -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
