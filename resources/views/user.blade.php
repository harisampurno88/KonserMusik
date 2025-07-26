<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tiket Konser Musik</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('customer/assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .masthead {
            padding-top: 8rem;
            padding-bottom: 4rem;
            background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            text-align: center;
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
            text-align: center;
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/user">Konser Musik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/user">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#promo">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container">
            <h1 class="display-5 fw-bold mb-4">Pengalaman Konser Impian Anda Ada Di Sini</h1>
            <p class="lead">Temukan dan Amankan Tiket Terbaik untuk Setiap Acara Musik Spektakuler.</p>
            <a class="btn btn-warning btn-lg mt-3" href="/transaksi/create">Pesan Sekarang</a>
        </div>
    </header>

    <section class="py-5">
       <div class="container mt-5" id="promo">
    <div class="row">
        {{-- Promo 1 --}}
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('customer/assets/img/1.png') }}"
                     class="card-img-top p-2"
                     alt="Promo Medan Festival"
                     style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa; border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title">MEDAN FESTIVAL</h5>
                    <p class="card-text">
                        <del class="text-muted">VIP Rp175.000</del><br>
                        <strong class="text-danger">VIP Rp140.000</strong><br>
                        <small class="text-muted">Berlaku s.d 20 Juli 2025</small>
                    </p>
                    <a href="/transaksi/create" class="btn btn-outline-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        {{-- Promo 2 --}}
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('customer/assets/img/2.png') }}"
                     class="card-img-top p-2"
                     alt="Promo Palembang Night"
                     style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa; border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title">Gaung Merah SeGALAnya</h5>
                    <p class="card-text">
                        <del class="text-muted">Reguler Rp100.000</del><br>
                        <strong class="text-danger">Reguler Rp75.000</strong><br>
                        <small class="text-muted">Berlaku s.d 15 Agustus 2025</small>
                    </p>
                    <a href="/transaksi/create" class="btn btn-outline-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        {{-- Promo 3 --}}
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('customer/assets/img/3.png') }}"
                     class="card-img-top p-2"
                     alt="Promo Bandung Summer"
                     style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa; border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title">HINDIA</h5>
                    <p class="card-text">
                        <del class="text-muted">VVIPRp200.000</del><br>
                        <strong class="text-danger">VVIP Rp165.000</strong><br>
                        <small class="text-muted">Berlaku s.d 9 September 2025</small>
                    </p>
                    <a href="/transaksi/create" class="btn btn-outline-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

    </section>

    <footer class="footer">
        <div class="container">
            <p class="mb-1">&copy; 2025 Tiket Konser Musik. All rights reserved.</p>
            <p class="mb-0">Follow kami di
                <a href="#" class="text-light mx-1"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light mx-1"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-light mx-1"><i class="bi bi-twitter"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
