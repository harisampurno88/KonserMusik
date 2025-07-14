@extends('layout.master') {{-- Pastikan ini mengacu pada layout master admin Anda --}}

@section('title', 'Data Transaksi') {{-- Ubah judul halaman --}}

@push('styles')
    {{-- Anda bisa menambahkan CSS khusus untuk halaman ini di sini --}}
    <style>
        .table td:last-child,
        .table th:last-child {
            text-align: center;
        }

        .table td .d-flex {
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1> {{-- Ubah judul H1 --}}
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            {{-- START DATA --}}
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-md-4 p-0">
                            {{-- Form pencarian untuk transaksi --}}
                            <form class="d-flex" action="{{ route('transaksi.index') }}" method="get"> {{-- Arahkan ke route transaksi admin --}}
                                <input class="form-control me-1" type="search" name="katakunci"
                                    value="{{ Request::get('katakunci') }}" placeholder="Cari ID Transaksi/User"
                                    aria-label="Search">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">NO</th>
                                    <th class="col-md-1">ID Transaksi</th>
                                    <th class="col-md-2">Pengguna</th>
                                    <th class="col-md-2">Nama Konser</th>
                                    <th class="col-md-1">Jenis Tiket</th>
                                    <th class="col-md-1">Jumlah</th>
                                    <th class="col-md-1">Total Bayar</th>
                                    <th class="col-md-1">Status</th>
                                    <th class="col-md-1">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = $transaksis->firstItem(); @endphp {{-- Gunakan $transaksis --}}
                                @foreach ($transaksis as $item) {{-- Loop melalui $transaksis --}}
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td>{{ $item->id }}</td> {{-- ID transaksi --}}
                                        <td>{{ $item->user->name ?? 'N/A' }}</td> {{-- Nama pengguna dari relasi --}}
                                        <td>{{ $item->tiket->konser->nama_konser ?? 'N/A' }}</td> {{-- Nama konser dari relasi tiket dan konser --}}
                                        <td>{{ $item->tiket->jenis_tiket ?? 'N/A' }}</td> {{-- Jenis tiket dari relasi --}}
                                        <td>{{ $item->jumlah_tiket }}</td>
                                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        <td>
                                            <p>Berhasil</p>
                                        </td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-end">
                        {{ $transaksis->withQueryString()->links() }} {{-- Gunakan $transaksis untuk pagination --}}
                    </div>
                </div>
            </div>
            {{-- AKHIR DATA --}}
        </div>
    </section>
@endsection