@extends('layout.master')

@section('title', 'Data Konser')

@push('styles')
    {{-- You can add any specific CSS for this page here --}}
    <style>
        /* Optional: Custom styling for table actions if needed */
        .table td:last-child,
        .table th:last-child {
            text-align: center;
            /* Center the actions column header */
        }

        .table td .d-flex {
            justify-content: center;
            /* Center the action buttons within the cell */
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Konser</h1>
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
                            <form class="d-flex" action="{{ url('konser') }}" method="get">
                                <input class="form-control me-1" type="search" name="katakunci"
                                    value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                                    aria-label="Search">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>
                        <div class="pb-0">
                            <a href='{{ url('konser/create') }}' class="btn btn-primary">+ Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">NO</th>
                                    <th class="col-md-2">ID KONSER</th>
                                    <th class="col-md-2">NAMA KONSER</th>
                                    <th class="col-md-2">TANGGAL</th>
                                    {{-- Kolom baru untuk Artis (ID & Nama) --}}
                                    <th class="col-md-2">ARTIS</th>
                                    {{-- Kolom baru untuk Lokasi (ID & Nama) --}}
                                    <th class="col-md-2">LOKASI</th>
                                    {{-- Kolom baru untuk Promotor (ID & Nama) --}}
                                    <th class="col-md-2">PROMOTOR</th>
                                    <th class="col-md-3 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = $data->firstItem(); @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td>{{ $item->id_konser }}</td>
                                        <td>{{ $item->nama_konser }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td> {{-- Format tanggal --}}
                                        <td>
                                            {{ $item->id_artis }}
                                            @if($item->artis)
                                                - {{ $item->artis->nama_artis }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->id_lokasi }}
                                            @if($item->lokasi)
                                                - {{ $item->lokasi->nama_lokasi }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->id_promotor }}
                                            @if($item->promotor)
                                                - {{ $item->promotor->nama_promotor }}
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href='{{ url('konser/' . $item->id_konser . '/edit') }}'
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Yakin akan menghapus data?')"
                                                action="{{ url('konser/' . $item->id_konser) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit"
                                                    class="btn btn-danger btn-sm">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-end">
                        {{ $data->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            {{-- AKHIR DATA --}}
        </div>
    </section>
@endsection