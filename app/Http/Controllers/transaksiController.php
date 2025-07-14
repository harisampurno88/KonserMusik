<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Str; // Tidak digunakan dalam kode yang diberikan, bisa dihapus jika tidak ada kebutuhan lain

class TransaksiController extends Controller
{
    public function create()
    {
        $konserList = konser::all();
        $tiketList = tiket::all(); // Perbaiki case "tiket" menjadi "Tiket"

        return view('transaksi.create', compact('konserList', 'tiketList'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input dari pengguna
        $request->validate([
            'id_konser'    => 'required|exists:konser,id_konser',
            'id_tiket'     => 'required|exists:tiket,id_tiket',
            'jumlah_tiket' => 'required|integer|min:1',
        ], [
            'id_konser.required'    => 'Pilih konser terlebih dahulu.',
            'id_konser.exists'      => 'Konser yang dipilih tidak valid.',
            'id_tiket.required'     => 'Pilih jenis tiket terlebih dahulu.',
            'id_tiket.exists'       => 'Jenis tiket yang dipilih tidak valid.',
            'jumlah_tiket.required' => 'Masukkan jumlah tiket.',
            'jumlah_tiket.integer'  => 'Jumlah tiket harus berupa angka.',
            'jumlah_tiket.min'      => 'Jumlah tiket minimal 1.',
        ]);

        $idKonser = $request->input('id_konser');
        $idTiket = $request->input('id_tiket');
        $jumlahTiket = $request->input('jumlah_tiket');

        // Ambil data tiket dari database
        $tiket = tiket::find($idTiket);

        // Verifikasi tiket dan konser
        if (!$tiket || $tiket->id_konser != $idKonser) {
            return back()->withInput()->withErrors('Jenis tiket tidak valid untuk konser yang dipilih.');
        }

        // Cek stok tiket (jika kamu mengelola stok di tabel 'tiket')
        if (isset($tiket->stok) && $tiket->stok < $jumlahTiket) {
            return back()->withInput()->withErrors('Maaf, stok tiket tidak mencukupi.');
        }

        // Hitung harga dan total harga
        // Pastikan kolom 'harga' ada di tabel 'tiket' (atau 'price' jika sebelumnya 'price')
        // Berdasarkan chat sebelumnya, kamu bilang 'price', tapi di kode ini 'harga'. Sesuaikan!
        // Saya asumsikan kamu ingin menggunakan 'harga' seperti di kode ini.
        $hargaPerTiket = $tiket->harga;
        $totalHarga = $hargaPerTiket * $jumlahTiket;

        // Simpan transaksi ke database dalam database transaction
        try {
            $transaksiId = null; // Deklarasi variabel di luar closure

            // Perbaiki: Tambahkan '&' pada $transaksiId di 'use' untuk memungkinkan perubahan nilai di dalam closure
            DB::transaction(function () use ($request, $tiket, $jumlahTiket, $hargaPerTiket, $totalHarga, &$transaksiId) {
                $transaksi = new Transaksi();
                $transaksi->user_id = auth()->id();
                $transaksi->id_konser = $tiket->id_konser;
                $transaksi->id_tiket = $tiket->id_tiket;
                $transaksi->jumlah_tiket = $jumlahTiket;
                $transaksi->harga_per_tiket = $hargaPerTiket;
                $transaksi->total_harga = $totalHarga;
                $transaksi->save();

                // Ambil ID transaksi yang baru dibuat setelah disimpan
                $transaksiId = $transaksi->id; // Ini akan mengambil ID dari kolom 'id'

                // Opsional: Update stok tiket setelah transaksi
                if (isset($tiket->stok)) {
                    $tiket->stok -= $jumlahTiket;
                    $tiket->save();
                }
            });

            // Redirect ke halaman detail transaksi dengan ID yang benar
            // Perbaiki: Gunakan $transaksiId yang sudah diisi, bukan $id_transaksi
            return redirect()->route('transaksi.show', ['transaksi' => $transaksiId])
                             ->with('success', 'Pemesanan tiket berhasil diproses! Detail transaksi Anda:');

        } catch (\Exception $e) {
            // Hapus dd($e->getMessage()); jika masih ada. Kita ingin redirect ke back().
            // dd($e->getMessage()); // Jika ini aktif, maka akan menghentikan eksekusi

            Log::error('Gagal menyimpan transaksi: ' . $e->getMessage());
            return back()->withInput()->withErrors('Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi.');
        }
    }

    /**
     * Tampilkan detail transaksi tertentu.
     * Menggunakan Route Model Binding untuk mendapatkan instance Transaksi secara otomatis.
     *
     * @param  \App\Models\Transaksi  $transaksi  // Pastikan parameter ini ada dan tipenya Transaksi
     * @return \Illuminate\View\View
     */
    public function show(Transaksi $transaksi)
    {
        // Pastikan transaksi ini milik user yang sedang login (optional, tapi sangat disarankan)
        if (auth()->id() !== $transaksi->user_id) {
            abort(403, 'Akses tidak diizinkan.'); // Forbidden
        }

        // Load relasi 'konser' dan 'tiket' agar bisa diakses di view
        $transaksi->load(['konser', 'tiket']);

        // Kirim objek transaksi ke view
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Menampilkan daftar transaksi untuk halaman admin.
     *
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        $transaksis = Transaksi::with(['user', 'tiket.konser']) // Eager load relationships
                                ->latest()
                                ->paginate(3); // Mengambil semua transaksi, diurutkan dari yang terbaru

        // Kirim data transaksi ke view
        return view('transaksi.index', compact('transaksis'));
    }
}