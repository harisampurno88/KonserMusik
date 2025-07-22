<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tiket Konser Musik</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('customer/assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="{{ asset('customer/css/styles.css') }}" rel="stylesheet" />
    <style>
        /* Opsional: Sesuaikan tinggi gambar korsel jika diperlukan */
        .carousel-item img {
            max-height: 350px; /* Sesuaikan sesuai kebutuhan */
            object-fit: fit;
            width: 100%; /* Memastikan gambar mengisi lebar korsel */   
        }
        .carousel-inner {
            border-radius: 10px; /* Sudut membulat untuk korsel */
            overflow: hidden; /* Memastikan border-radius diterapkan dengan benar */
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/user">Konser Musik</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end mb-5">
                    <h2 class="text-white font-weight-bold">Pengalaman Konser Impian Anda Ada Di Sini</h2>
                </div>
                <div class="col-lg-12 align-self-baseline">
                    <div id="concertCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#concertCarousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#concertCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#concertCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('customer/assets/img/1.png') }}" class="d-block w-100"
                                    alt="Concert Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('customer/assets/img/2.png') }}" class="d-block w-100"
                                    alt="Concert Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('customer/assets/img/3.png') }}" class="d-block w-100"
                                    alt="Concert Image 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#concertCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#concertCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="text-white-75 mb-5 mt-5">Temukan dan Amankan Tiket Terbaik untuk Setiap Acara Musik
                        Spektakuler.
                        Siapkan dirimu untuk malam yang penuh melodi dan kegembiraan!</p>
                    <a class="btn btn-primary btn-xl" href="/transaksi/create">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="{{ asset('customer/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>