@section('head')
    Data Konser
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('konser/' . $data->id_konser) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('konser') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_konser" class="col-sm-2 col-form-label">ID konser</label>
                        <div class="col-sm-10">
                            {{ $data->id_konser }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_konser" class="col-sm-2 col-form-label">NAMA KONSER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_konser' value="{{ $data->nama_konser }}"
                                id="nama_konser">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">TANGGAL</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal' value="{{ $data->tanggal }}"
                                id="tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_artis" class="col-sm-2 col-form-label">ID ARTIS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_artis' value="{{ $data->id_artis }}"
                                id="id_artis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_lokasi" class="col-sm-2 col-form-label">ID LOKASI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_lokasi' value="{{ $data->id_lokasi }}"
                                id="id_lokasi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_promotor" class="col-sm-2 col-form-label">ID PROMOTOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_promotor' value="{{ $data->id_promotor }}"
                                id="id_promotor">
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
