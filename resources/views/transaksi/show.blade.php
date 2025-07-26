<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Pemesanan Tiket</title>

    <!-- Bootstrap Icons & CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Gaya Kustom -->
    <style>
        body {
            background: linear-gradient(to right, #eef2ff, #e0ecff);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #1f3c88;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #dbeafe !important;
        }

        .page-header {
            padding: 2.5rem 1rem;
            background: linear-gradient(to right, #1e3a8a, #1e40af);
            color: white;
            text-align: center;
            margin-top: 2rem;
        }

        .ticket-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 30px;
            max-width: 700px;
            margin: 30px auto;
        }

        .ticket-card h5 {
            font-weight: bold;
            color: #1f3c88;
        }

        .ticket-card .label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .ticket-card .value {
            font-weight: 600;
            font-size: 1.05rem;
        }

        .btn-primary {
            background-color: #1f3c88;
            border: none;
        }

        .btn-primary:hover {
            background-color: #162d6a;
        }

        @media print {

            .navbar,
            .btn,
            .page-header {
                display: none !important;
            }

            .ticket-card {
                box-shadow: none !important;
                border: 1px solid #ccc;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/user">KonserKu</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
    <div class="page-header">
        <h2>Detail Pemesanan Tiket Konser</h2>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="ticket-card">

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h5 class="text-center mb-4">Informasi Pemesanan Anda</h5>

        <div class="mb-3">
            <span class="label">Nama Konser:</span>
            <div class="value">{{ $transaksi->konser->nama_konser }}</div>
        </div>

        <div class="mb-3">
            <span class="label">Status Pemesanan:</span>
            <div class="value">
                <span class="badge bg-info text-dark">Berhasil</span>
            </div>
        </div>

        <div class="mb-3">
            <span class="label">ID Pemesanan:</span>
            <div class="value">#{{ $transaksi->id }}</div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <span class="label">Jenis Tiket:</span>
                <div class="value">{{ $transaksi->tiket->jenis_tiket }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <span class="label">Tanggal Pemesanan:</span>
                <div class="value">{{ $transaksi->created_at->format('d M Y, H:i') }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <span class="label">Harga per Tiket:</span>
                <div class="value">Rp {{ number_format($transaksi->harga_per_tiket, 0, ',', '.') }}</div>
            </div>
            <div class="col-md-6 mb-3">
                <span class="label">Jumlah Tiket:</span>
                <div class="value">{{ $transaksi->jumlah_tiket }}</div>
            </div>
        </div>

        <hr>

        <div class="mb-4">
            <h5 class="mb-3">Informasi Pembayaran</h5>

            <div class="mb-3">
                <span class="label">Kode Pembayaran:</span>
                <div class="value">KONSER-{{ strtoupper(Str::random(6)) }}</div>
                <!-- Anda juga bisa pakai hardcode contoh: <div class="value">KONSER-98AH32</div> -->
            </div>

            <div class="mb-3">
                <span class="label">Status Pembayaran:</span>
                <div class="value text-danger fw-semibold">Belum Dibayar (Bayar saat tiba di lokasi konser)</div>
            </div>

            <div class="mb-3 text-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=KONSER-{{ strtoupper(Str::random(6)) }}"
                    alt="Barcode Tiket" />
                <div class="small text-muted mt-2">Tunjukkan barcode ini saat tiba di lokasi konser</div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5>Total Bayar:</h5>
            <h4 class="text-success fw-bold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h4>
        </div>

        <div class="text-center">
            <a href="/user" class="btn btn-primary me-2">
                <i class="bi bi-house-door-fill me-1"></i> Kembali
            </a>
            <button onclick="window.print()" class="btn btn-secondary">
                <i class="bi bi-printer-fill me-1"></i> Cetak Tiket
            </button>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
