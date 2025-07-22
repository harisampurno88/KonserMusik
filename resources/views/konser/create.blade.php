@section('head')
    Data Konser
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('konser') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('konser') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_konser" class="col-sm-2 col-form-label">ID KONSER</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_konser'
                                value="{{ Session::get('id_konser') }}" id="id_konser">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_konser" class="col-sm-2 col-form-label">NAMA KONSER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_konser'
                                value="{{ Session::get('nama_konser') }}" id="nama_konser">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">TANGGAL</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal'
                                value="{{ Session::get('tanggal') }}" id="tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_artis" class="col-sm-2 col-form-label">ID ARTIS</label>
                        <div class="col-sm-10">
                            <select name="id_artis" id="id_artis" class="form-select">
                                <option value="">-- Pilih Artis --</option>
                                @forelse ($artisList as $artis)
                                    <option value="{{ $artis->id_artis }}"
                                        {{ (old('id_artis') ?? (Session::get('id_artis') ?? '')) == $artis->id_artis ? 'selected' : '' }}>
                                        {{ $artis->id_artis }} - {{ $artis->nama_artis }}
                                    </option>
                                @empty
                                    <option disabled>Data Artis belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_lokasi" class="col-sm-2 col-form-label">ID LOKASI</label>
                        <div class="col-sm-10">
                            <select name="id_lokasi" id="id_lokasi" class="form-select">
                                <option value="">-- Pilih Id Lokasi --</option>
                                @forelse ($lokasiList as $lokasi)
                                    <option value="{{ $lokasi->id_lokasi }}"
                                        {{ (old('id_lokasi') ?? (Session::get('id_lokasi') ?? '')) == $lokasi->id_lokasi ? 'selected' : '' }}>
                                        {{ $lokasi->id_lokasi }} - {{ $lokasi->nama_lokasi }}
                                    </option>
                                @empty
                                    <option disabled>Data Lokasi belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_promotor" class="col-sm-2 col-form-label">ID PROMOTOR</label>
                        <div class="col-sm-10">
                            <select name="id_promotor" id="id_promotor" class="form-select">
                                <option value="">-- Pilih Id Promotor --</option>
                                @forelse ($promotorList as $promotor)
                                    <option value="{{ $promotor->id_promotor }}"
                                        {{ (old('id_promotor') ?? (Session::get('id_promotor') ?? '')) == $promotor->id_promotor ? 'selected' : '' }}>
                                        {{ $promotor->id_promotor }} - {{ $promotor->nama_promotor }}
                                    </option>
                                @empty
                                    <option disabled>Data Promotor belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>
@endsection
<!-- AKHIR FORM -->
