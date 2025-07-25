@extends('layout.master')

@section('title', 'Data Sponsor')

@push('styles')
    {{-- You can add any specific CSS for this page here --}}
    <style>
        /* Optional: Custom styling for table actions if needed */
        .table td:last-child,
        .table th:last-child {
            text-align: center;
            /* Center the actions column header */
        }

        .table td .d-flex {
            justify-content: center;
            /* Center the action buttons within the cell */
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Sponsor</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            {{-- START DATA --}}
            <div class="card"> {{-- Added card wrapper --}}
                <div class="card-header"> {{-- Card header for search and add button --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-md-4 p-0"> {{-- Use Bootstrap grid for search form width --}}
                            <form class="d-flex" action="{{ url('sponsor') }}" method="get">
                                <input class="form-control me-1" type="search" name="katakunci"
                                    value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                                    aria-label="Search">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>
                        <div class="pb-0"> {{-- No top/bottom padding here, handled by card-header --}}
                            <a href='{{ url('sponsor/create') }}' class="btn btn-primary">+ Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body"> {{-- Card body for the table --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"> {{-- Added table-hover for visual feedback --}}
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">NO</th> {{-- Center align NO --}}
                                    <th class="col-md-2">ID SPONSOR</th>
                                    <th class="col-md-2">NAMA SPONSOR</th>
                                    <th class="col-md-2">ID KONSER</th>
                                    <th class="col-md-2">DESKRIPSI</th>
                                    <th class="col-md-3 text-center">AKSI</th> {{-- Center align AKSI --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = $data->firstItem(); @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td> {{-- Center align row number --}}
                                        <td>{{ $item->id_sponsor }}</td>
                                        <td>{{ $item->nama_sponsor }}</td>
                                        <td>
                                            {{ $item->id_konser }}
                                            @if($item->konser)
                                                - {{ $item->konser->nama_konser }}
                                            @endif
                                        </td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td class="d-flex justify-content-center gap-2"> {{-- Center align buttons --}}
                                            <a href='{{ url('sponsor/' . $item->id_sponsor . '/edit') }}'
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Yakin akan menghapus data?')"
                                                action="{{ url('sponsor/' . $item->id_sponsor) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit"
                                                    class="btn btn-danger btn-sm">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix"> {{-- Card footer for pagination --}}
                    <div class="d-flex justify-content-end">
                        {{ $data->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            {{-- AKHIR DATA --}}
        </div>
    </section>
@endsection
