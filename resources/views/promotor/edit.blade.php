@section('head')
    Data Promotor
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('promotor/' . $data->id_promotor) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('promotor') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_promotor" class="col-sm-2 col-form-label">ID PROMOTOR</label>
                        <div class="col-sm-10">
                            {{ $data->id_promotor }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_promotor" class="col-sm-2 col-form-label">NAMA PROMOTOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_promotor' value="{{ $data->nama_promotor }}"
                                id="nama_promotor">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name='email' value="{{ $data->email }}"
                                id="email">
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
