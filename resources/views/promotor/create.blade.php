@section('head')
    Data Promotor
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('promotor') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('promotor') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_promotor" class="col-sm-2 col-form-label">ID PROMOTOR</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_promotor'
                                value="{{ Session::get('id_promotor') }}" id="id_promotor">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_promotor" class="col-sm-2 col-form-label">NAMA PROMOTOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_promotor'
                                value="{{ Session::get('nama_promotor') }}" id="nama_promotor">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name='email'
                                value="{{ Session::get('email') }}" id="email">
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
