@section('head')
    Data Tiket
@endsection
@extends('layout.master')
<!-- START FORM -->
@section('content')
    <form action='{{ url('tiket/' . $data->id_tiket) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('tiket') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_tiket" class="col-sm-2 col-form-label">ID TIKET</label>
                        <div class="col-sm-10">
                            {{ $data->id_tiket }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_konser" class="col-sm-2 col-form-label">ID KONSER</label>
                        <div class="col-sm-10">
                            <select name="id_konser" id="id_konser" class="form-select">
                                <option value="">-- Pilih Id konser --</option>
                                @forelse ($konserList as $konser)
                                    <option value="{{ $konser->id_konser }}"
                                        {{ old('id_konser', $data->id_konser ?? '') == $konser->id_konser ? 'selected' : '' }}>
                                        {{ $konser->id_konser }} - {{ $konser->nama_konser }}
                                    </option>
                                @empty
                                    <option disabled>Data konser belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_tiket" class="col-sm-2 col-form-label">JENIS TIKET</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jenis_tiket" id="jenis_tiket">
                                <option value="">-- Pilih Jenis Tiket --</option>
                                <option value="VVIP" {{ $data->jenis_tiket == 'VVIP' ? 'selected' : '' }}>
                                    VVIP</option>
                                <option value="VIP" {{ $data->jenis_tiket == 'VIP' ? 'selected' : '' }}>
                                    VIP</option>
                                <option value="Reguler" {{ $data->jenis_tiket == 'Reguler' ? 'selected' : '' }}>
                                    Reguler</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">HARGA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='harga' value="{{ $data->harga }}"
                                id="harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">STOK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='stok' value="{{ $data->stok }}"
                                id="stok">
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
