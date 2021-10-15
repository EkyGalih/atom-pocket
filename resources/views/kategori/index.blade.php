@extends('layouts.app')

@section('title', 'Dompet')

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <h5 class="sub_title">KATEGORI - </h5>
    </div>
    <div class="col-4 col-m-1">
        <h5 class="sub_title btn-group">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Buat Baru</a>
            {{-- <a href="#" class="btn btn-info btn-sm">Aktif ({{ $dompet->where('status_dompet', '=', 'Aktif')->count() }})</a> --}}
        </h5>
    </div>
</div>
<table class="table table-hover-table-striped table-primary" id="dompet">
    <thead>
        <tr>
            <td>#</td>
            <td>NAMA</td>
            <td>DESKRIPSI</td>
            <td>STATUS</td>
            <td></td>
        </tr>
    </thead>
    <tbody>

        @foreach ($kategori as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->status_kategori }}</td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">{{ $item->nama }}</a>
                            <hr/>
                            <a class="dropdown-item" href="#home"><i class="glyphicon glyphicon-search"></i> Detail</a>
                            <a class="dropdown-item" href="{{ route('kategori.edit', $item->kategori_id) }}"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                            @if ($item->status_dompet == 'Aktif')
                            <a class="dropdown-item" href="{{ route('kategori.status', $item->status_ID) }}"><i class="glyphicon glyphicon-times"></i> Tidak Aktif</a>
                            @else
                            <a class="dropdown-item" href="{{ route('kategori.status', $item->status_ID) }}"><i class="glyphicon glyphicon-check"></i> Aktif</a>
                            @endif
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

