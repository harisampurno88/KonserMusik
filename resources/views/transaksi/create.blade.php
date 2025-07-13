{{-- Menggunakan layout yang kamu berikan --}}
@extends('layout.user-main') {{-- Pastikan nama layout ini sesuai dengan file layoutmu, yaitu user_main.blade.php di folder layouts --}}

{{-- Judul halaman --}}
@section('title', 'Pesan Tiket Konser')

{{-- Bagian konten yang akan disisipkan ke @yield('content') di layout --}}
@section('content')
<div class="col-lg-8 align-self-baseline">
    {{-- Form Pemesanan --}}
    <div class="card bg-white text-dark shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body p-4 p-lg-5">

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf {{-- Token CSRF untuk keamanan form Laravel --}}

                {{-- Input untuk Pilih Konser --}}
                <div class="mb-4">
                    <label for="id_konser" class="form-label text-dark fw-bold">Pilih Konser:</label>
                    <select class="form-control form-control-lg" id="id_konser" name="id_konser" required>
                        <option value="">-- Pilih Konser --</option>
                        @foreach($konserList as $konser)
                            <option value="{{ $konser->id_konser }}" {{ old('id_konser') == $konser->id_konser ? 'selected' : '' }}>
                                {{ $konser->nama_konser }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_konser')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input untuk Pilih Jenis Tiket (Dropdown Kedua - Akan diisi via JS) --}}
                <div class="mb-4">
                    <label for="id_tiket" class="form-label text-dark fw-bold">Pilih Jenis Tiket:</label>
                    <select class="form-control form-control-lg" id="id_tiket" name="id_tiket" required disabled>
                        <option value="">-- Pilih Konser Dulu --</option>
                    </select>
                    @error('id_tiket')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Jumlah Tiket --}}
                <div class="mb-4">
                    <label for="jumlah_tiket" class="form-label text-dark fw-bold">Jumlah Tiket:</label>
                    <input type="number" class="form-control form-control-lg" id="jumlah_tiket" name="jumlah_tiket" min="1" value="{{ old('jumlah_tiket', 1) }}" required>
                    @error('jumlah_tiket')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-xl">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Skrip JavaScript untuk Dropdown Dinamis Tiket (berdasarkan pilihan Konser) --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const konserSelect = document.getElementById('id_konser');
        const tiketSelect = document.getElementById('id_tiket');

        // Mengambil semua data tiket yang dikirim dari controller sebagai JSON
        // Ini akan digunakan untuk memfilter tiket berdasarkan konser yang dipilih.
        // Pastikan model Tiket memiliki kolom 'id_konser' dan 'price'.
        const allTickets = @json($tiketList); 

        // Fungsi untuk memuat tiket berdasarkan konser yang dipilih
        function loadTickets(konserId) {
            tiketSelect.innerHTML = '<option value="">-- Memuat Tiket... --</option>';
            tiketSelect.disabled = true; // Nonaktifkan dropdown tiket saat memuat

            // Filter tiket yang id_konser-nya cocok dengan konserId yang dipilih
            const filteredTickets = allTickets.filter(ticket => ticket.id_konser == konserId);

            tiketSelect.innerHTML = '<option value="">-- Pilih Jenis Tiket --</option>';
            if (filteredTickets.length > 0) {
                filteredTickets.forEach(ticket => {
                    const option = document.createElement('option');
                    option.value = ticket.id_tiket;
                    // Menampilkan nama jenis tiket dan harganya
                    option.textContent = `${ticket.jenis_tiket} (Rp${new Intl.NumberFormat('id-ID').format(ticket.harga)})`;
                    // Untuk mempertahankan pilihan jika validasi gagal, cocokkan dengan old('id_tiket')
                    option.selected = (ticket.id == "{{ old('id_tiket') }}");
                    tiketSelect.appendChild(option);
                });
                tiketSelect.disabled = false; // Aktifkan kembali dropdown tiket
            } else {
                tiketSelect.innerHTML = '<option value="">-- Tidak ada tiket tersedia untuk konser ini --</option>';
            }
        }

        // Event listener untuk perubahan pilihan konser
        konserSelect.addEventListener('change', function() {
            loadTickets(this.value);
        });

        // Logika untuk mengisi kembali dropdown tiket jika ada nilai old (misalnya setelah validasi gagal)
        if (konserSelect.value) {
            loadTickets(konserSelect.value);
        }
    });
</script>
@endpush
@endsection