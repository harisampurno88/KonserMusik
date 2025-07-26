<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f0f4ff, #e0e7ff);
            font-family: 'Segoe UI', sans-serif;
        }

        nav {
            background-color: #1f3c88;
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #cbd5ff !important;
        }

        .card-form {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            margin: 100px auto;
        }

        h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1f3c88;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        select, input {
            padding: 12px;
            border-radius: 10px;
        }

        button {
            background-color: #1f3c88;
            padding: 14px 20px;
            border-radius: 10px;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
            color: white;
        }

        button:hover {
            background-color: #162d6a;
        }

        small {
            color: red;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/user">Konser Musik</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://wa.me/085360053233">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FORMULIR -->
    <div class="card-form" id="form-pesan">
        <h2>Pemesanan Tiket Konser</h2>

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_konser">Pilih Konser:</label>
                <select name="id_konser" id="id_konser" class="form-control" required>
                    <option value="">-- Pilih Konser --</option>
                    @foreach($konserList as $konser)
                        <option value="{{ $konser->id_konser }}" {{ old('id_konser') == $konser->id_konser ? 'selected' : '' }}>
                            {{ $konser->nama_konser }} - {{ \Carbon\Carbon::parse($konser->tanggal)->translatedFormat('d F Y') }}
                        </option>
                    @endforeach
                </select>
                @error('id_konser')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_tiket">Pilih Jenis Tiket:</label>
                <select name="id_tiket" id="id_tiket" class="form-control" required disabled>
                    <option value="">-- Pilih Konser Dulu --</option>
                </select>
                @error('id_tiket')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jumlah_tiket">Jumlah Tiket:</label>
                <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" value="{{ old('jumlah_tiket', 1) }}" min="1" required>
                @error('jumlah_tiket')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>

    <!-- FOOTER/KONTAK -->
    <footer class="text-center py-4 mt-5" id="kontak">
        <p class="text-muted">© 2025 KonserKu. Hubungi kami: konserku@email.com</p>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const konserSelect = document.getElementById('id_konser');
            const tiketSelect = document.getElementById('id_tiket');

            const allTickets = @json($tiketList);

            function loadTickets(konserId) {
                tiketSelect.innerHTML = '<option value="">-- Memuat Tiket... --</option>';
                tiketSelect.disabled = true;

                const filteredTickets = allTickets.filter(ticket => ticket.id_konser == konserId);

                tiketSelect.innerHTML = '<option value="">-- Pilih Jenis Tiket --</option>';
                if (filteredTickets.length > 0) {
                    filteredTickets.forEach(ticket => {
                        const option = document.createElement('option');
                        option.value = ticket.id_tiket;
                        option.textContent = `${ticket.jenis_tiket} (Rp${new Intl.NumberFormat('id-ID').format(ticket.harga)})`;
                        tiketSelect.appendChild(option);
                    });
                    tiketSelect.disabled = false;
                } else {
                    tiketSelect.innerHTML = '<option value="">-- Tidak ada tiket tersedia --</option>';
                }
            }

            konserSelect.addEventListener('change', function() {
                loadTickets(this.value);
            });

            if (konserSelect.value) {
                loadTickets(konserSelect.value);
            }
        });
    </script>
</body>
</html>
