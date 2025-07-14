<?php

namespace App\Http\Controllers;

use App\Models\artis;
use App\Models\konser;
use App\Models\lokasi;
use App\Models\promotor;
use App\Models\sponsor;
use App\Models\tiket;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah data dari masing-masing tabel
        $jumlahKonser = konser::count();
        $jumlahArtis = artis::count();
        $jumlahLokasi = lokasi::count();
        $jumlahPromotor = promotor::count();
        $jumlahSponsor = sponsor::count();
        $jumlahTiket = tiket::count(); 
        $jumlahUser = User::count();
        $jumlahTransaksi = transaksi::count();
        // Teruskan data ini ke view
        return view('dashboard', [ 
            'jumlahKonser' => $jumlahKonser,
            'jumlahArtis' => $jumlahArtis,
            'jumlahLokasi' => $jumlahLokasi,
            'jumlahPromotor' => $jumlahPromotor,
            'jumlahSponsor' => $jumlahSponsor,
            'jumlahTiket' => $jumlahTiket,
            'jumlahUser' => $jumlahUser, 
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
    }
}