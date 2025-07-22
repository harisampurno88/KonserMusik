@section('head')
    Data Sponsor
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('sponsor') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('sponsor') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_sponsor" class="col-sm-2 col-form-label">ID SPONSOR</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_sponsor'
                                value="{{ Session::get('id_sponsor') }}" id="id_sponsor">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_sponsor" class="col-sm-2 col-form-label">NAMA SPONSOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_sponsor'
                                value="{{ Session::get('nama_sponsor') }}" id="nama_sponsor">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_konser" class="col-sm-2 col-form-label">ID KONSER</label>
                        <div class="col-sm-10">
                            <select name="id_konser" id="id_konser" class="form-select">
                                <option value="">-- Pilih konser --</option>
                                @forelse ($konserList as $konser)
                                    <option value="{{ $konser->id_konser }}"
                                        {{ (old('id_konser') ?? (Session::get('id_konser') ?? '')) == $konser->id_konser ? 'selected' : '' }}>
                                        {{ $konser->id_konser }} - {{ $konser->nama_konser }}
                                    </option>
                                @empty
                                    <option disabled>Data konser belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='deskripsi'
                                value="{{ Session::get('deskripsi') }}" id="deskripsi">
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
