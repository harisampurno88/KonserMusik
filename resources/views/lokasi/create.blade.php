@section('head')
    Data Lokasi
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('lokasi') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('lokasi') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_lokasi" class="col-sm-2 col-form-label">ID LOKASI</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_lokasi'
                                value="{{ Session::get('id_lokasi') }}" id="id_lokasi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lokasi" class="col-sm-2 col-form-label">NAMA LOKASI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_lokasi'
                                value="{{ Session::get('nama_lokasi') }}" id="nama_lokasi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat'
                                value="{{ Session::get('alamat') }}" id="alamat">
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
