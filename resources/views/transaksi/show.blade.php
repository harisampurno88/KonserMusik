<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman detail pemesanan tiket konser Anda." />
    <meta name="author" content="Your Name" />
    <title>Detail Pemesanan Tiket</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('customer/assets/favicon.ico') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <link href="{{ asset('customer/css/styles.css') }}" rel="stylesheet" />

    {{-- CSS Kustom untuk Pencetakan --}}
    <style>
        @media print {
            .navbar, .btn-primary, .btn-secondary, .alert, .masthead h2, .masthead .divider {
                display: none !important;
            }
            body {
                margin: 0;
                padding: 0;
                color: #000;
                background-color: #fff;
            }
            .masthead {
                height: auto !important;
                min-height: 0 !important;
                padding-top: 20px;
                padding-bottom: 20px;
                background: none !important;
            }
            .container {
                padding: 0 15px !important;
            }
            .ticket-card {
                border: 1px solid #ccc;
                box-shadow: none;
                margin: 0 auto;
                max-width: 800px;
                border-radius: 15px;
                display: flex;
                flex-direction: row;
            }
            .ticket-image-section { /* Gaya untuk div background image */
                flex: 0 0 30%;
                max-width: 30%;
                padding: 0;
                height: 250px; /* Tinggi fixed untuk cetak juga, sesuaikan */
                background-size: cover;
                background-position: center;
                border-top-left-radius: 15px;
                border-bottom-left-radius: 15px;
            }
            /* Sembunyikan elemen img jika ada di dalam cetakan untuk memastikan hanya div background yang tampil */
            .ticket-image-section img {
                display: none;
            }
            .ticket-details-section {
                flex: 1;
                padding: 20px;
            }
            .card-body {
                padding: 0 !important;
            }
            .ticket-details-section h5 {
                color: #000 !important;
                text-align: left;
                margin-top: 0;
                margin-bottom: 1rem;
            }
            hr.divider {
                display: none;
            }
            .text-white {
                color: #000 !important;
            }
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

    <header class="masthead" style="padding-top: 4rem; padding-bottom: 4rem; min-height: auto;">
        <div class="container px-4 px-lg-5 d-flex align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
                {{-- Bagian untuk Menampilkan Pesan Sukses atau Error --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h2 class="text-white font-weight-bold mb-4">Pemesanan Tiket Konser</h2>
                <hr class="divider my-4" />

                {{-- KARTU DETAIL PEMESANAN DENGAN TAMPILAN HORIZONTAL --}}
                <div class="card shadow-lg bg-white text-dark mx-auto ticket-card" style="max-width: 800px;">
                    {{-- Hapus align-items-stretch dari sini jika ada --}}
                    <div class="row g-0">
                        {{-- Bagian Kiri: Gambar Tiket (menggunakan background-image) --}}
                        <div class="col-md-4 ticket-image-section" style="
                            background-image: url('{{ asset('customer/assets/img/gambar-tiket.png') }}'); {{-- ***GANTI DENGAN PATH GAMBAR VERTIKAL ASLI KAMU*** --}}
                            background-size: cover;
                            background-position: center;
                            height: 420px; /* ***SESUAIKAN TINGGI INI*** (Coba 250px atau 280px) */
                            border-top-left-radius: 15px;
                            border-bottom-left-radius: 15px;
                        ">
                            {{-- Tidak ada tag <img> di sini --}}
                        </div>

                        {{-- Bagian Kanan: Detail Tiket --}}
                        <div class="col-md-8 ticket-details-section">
                            <div class="card-body text-start">
                                <h5 class="mb-3 text-center text-md-start text-muted">Detail Pemesanan Anda</h5>
                                <hr class="my-3">

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="mb-0 text-primary fw-bold">{{ $transaksi->konser->name }}</h4>
                                    <span class="badge bg-info text-dark py-1 px-2 rounded-pill">{{ ucfirst($transaksi->status_transaksi) }}</span>
                                </div>
                                <h6 class="text-muted mb-3">#ID Pemesanan: {{ $transaksi->id }}</h6>

                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <p class="mb-0 text-muted"><small>Jenis Tiket</small></p>
                                        <p class="fw-bold">{{ $transaksi->tiket->name }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="mb-0 text-muted"><small>Tanggal Pemesanan</small></p>
                                        <p class="fw-bold">{{ $transaksi->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <p class="mb-0 text-muted"><small>Harga Per Tiket</small></p>
                                        <p class="fw-bold">Rp {{ number_format($transaksi->harga_per_tiket, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="mb-0 text-muted"><small>Jumlah Tiket</small></p>
                                        <p class="fw-bold">{{ $transaksi->jumlah_tiket }}</p>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Total Pembayaran:</h5>
                                    <h4 class="mb-0 text-success fw-bold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h4>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="/user" class="btn btn-primary btn-lg">
                                        <i class="bi bi-house-door-fill me-2"></i>Kembali
                                    </a>

                                    <button onclick="window.print()" class="btn btn-secondary btn-lg ms-3">
                                        <i class="bi bi-printer-fill me-2"></i>Cetak Tiket
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="{{ asset('customer/js/scripts.js') }}"></script>
</body>
</html>