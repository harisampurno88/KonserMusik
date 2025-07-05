@section('head')
    Data Lokasi
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('lokasi/' . $data->id_lokasi) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('lokasi') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_lokasi" class="col-sm-2 col-form-label">ID LOKASI</label>
                        <div class="col-sm-10">
                            {{ $data->id_lokasi }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lokasi" class="col-sm-2 col-form-label">NAMA LOKASI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_lokasi' value="{{ $data->nama_lokasi }}"
                                id="nama_lokasi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}"
                                id="alamat">
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
