@section('head')
    Data ARTIS
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('artis/' . $data->id_artis) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('artis') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_artis" class="col-sm-2 col-form-label">ID ARTIS</label>
                        <div class="col-sm-10">
                            {{ $data->id_artis }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_artis" class="col-sm-2 col-form-label">NAMA ARTIS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_artis' value="{{ $data->nama_artis }}"
                                id="nama_artis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="genre" class="col-sm-2 col-form-label">GENRE</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="genre" id="genre">
                                <option value="">-- Pilih GENRE --</option>
                                <option value="Pop" {{ $data->genre == 'Pop' ? 'selected' : '' }}>
                                    POP</option>
                                <option value="EDM" {{ $data->genre == 'EDM' ? 'selected' : '' }}>
                                    EDM</option>
                                <option value="Dangdut" {{ $data->genre == 'Dangdut' ? 'selected' : '' }}>
                                    DANGDUT</option>
                                <option value="Rock" {{ $data->genre == 'Rock' ? 'selected' : '' }}>
                                    ROCK</option>
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
