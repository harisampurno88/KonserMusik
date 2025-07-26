<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konser Musik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(to bottom right, #0b0a1d, #141237);
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: rgba(0, 0, 30, 0.85) !important;
            padding: 15px 30px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff;
        }

        .nav-link {
            color: #c7c7c7 !important;
            margin-right: 15px;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 30px 20px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            color: #dcdcdc;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            margin-right: 10px;
        }

        .btn-register {
            border: 2px solid white;
            color: white;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            background: transparent;
        }

        section {
            padding: 60px 20px;
        }

        #tentang,
        #kontak {
            text-align: center;
        }

        #tentang h2,
        #kontak h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        #tentang p,
        #kontak p {
            max-width: 800px;
            margin: 0 auto;
            color: #dcdcdc;
            font-size: 1.1rem;
        }

        footer {
            background-color: #0b0a1a;
            color: #bbb;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
        }

        .section-divider {
            border: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.4);
            margin: 40px auto;
            max-width: 85%;
        }

        .kontak-icons {
            font-size: 1.5rem;
            margin: 10px;
            color: #ffffff;
            text-decoration: none;
        }

        .kontak-icons:hover {
            color: #00aced;
        }

        .fitur {
            text-align: center;
        }

        .fitur i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #00aced;
        }

        .fitur h5 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .fitur p {
            color: #ccc;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Konser Musik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary ms-3">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="container position-relative z-1">
            <h1 class="display-3 fw-bold mb-3">KONSER MUSIK</h1>
            <p class="lead mb-4">Temukan dan nikmati berbagai event musik terbaik langsung dari genggamanmu.</p>

            <blockquote class="blockquote mb-4">
                <p class="mb-0 fst-italic">"Musik menyatukan kita dalam setiap irama dan getaran."</p>
            </blockquote>

            <div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
                <a href="#" class="btn btn-outline-light btn-lg">Register</a>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <hr class="section-divider">

    <!-- Fitur Unggulan -->
    <section id="fitur">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4 fitur">
                    <i class="bi bi-calendar2-event-fill"></i>
                    <h5>Jadwal Lengkap</h5>
                    <p>Jelajahi berbagai jadwal konser dari seluruh Indonesia dengan mudah.</p>
                </div>
                <div class="col-md-4 fitur">
                    <i class="bi bi-tag-fill"></i>
                    <h5>Promo Harga Tiket</h5>
                    <p>Dapatkan promo dan diskon tiket konser menarik secara berkala.</p>
                </div>
                <div class="col-md-4 fitur">
                    <i class="bi bi-music-note-beamed"></i>
                    <h5>Rekomendasi Musik</h5>
                    <p>Temukan konser berdasarkan genre musik favoritmu dan artis favoritmu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <hr class="section-divider">

    <!-- Tentang -->
    <section id="tentang">
        <h2>Tentang Kami</h2>
        <p>
            Sistem Informasi Konser Musik adalah platform digital yang memudahkan pengguna untuk menemukan, melihat jadwal,
            dan mendapatkan informasi konser musik terkini. Kami berkomitmen menjadi jembatan antara penyelenggara konser dan
            pecinta musik di seluruh Indonesia.
        </p>
    </section>

    <!-- Divider -->
    <hr class="section-divider">

    <!-- Kontak -->
    <section id="kontak">
        <h2>Kontak Kami</h2>
        <p>Hubungi kami melalui:</p>
        <div>
            <a href="mailto:email@example.com" class="kontak-icons" target="_blank" title="Email">
                <i class="bi bi-envelope-fill"></i>
            </a>
            <a href="https://instagram.com/konsermusik" class="kontak-icons" target="_blank" title="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://wa.me/6281234567890" class="kontak-icons" target="_blank" title="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </section>

    <!-- Divider -->
    <hr class="section-divider">

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Sistem Informasi Konser Musik. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
