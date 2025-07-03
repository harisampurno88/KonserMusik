@section('head')
    Data ARTIS
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('artis') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('artis') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_artis" class="col-sm-2 col-form-label">ID ARTIS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_artis'
                                value="{{ Session::get('id_artis') }}" id="id_artis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_artis" class="col-sm-2 col-form-label">NAMA ARTIS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_artis'
                                value="{{ Session::get('nama_artis') }}" id="nama_artis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="genre" class="col-sm-2 col-form-label">GENRE</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="genre" value="{{ Session::get('genre') }}"
                                id="genre">
                                <option value="">-- Pilih GENRE --</option>
                                <option value="Pop">POP</option>
                                <option value="EDM">EDM</option>
                                <option value="Dangdut">DANGDUT</option>
                                <option value="Rock">ROCK</option>
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
