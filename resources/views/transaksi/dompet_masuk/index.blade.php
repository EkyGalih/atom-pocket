@extends('layouts.app')

@section('title', 'Dompet Masuk')

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <h5 class="sub_title">DOMPET MASUK</h5>
    </div>
    <div class="col-4 col-m-1">
        <h5 class="sub_title btn-group">
            <a href="{{ route('dompet_masuk.create') }}" class="btn btn-primary btn-sm">Buat Baru</a>
        </h5>
    </div>
</div>
<table class="table table-hover-table-striped table-primary" id="dompet">
    <thead>
        <tr>
            <td>#</td>
            <td>TANGGAL</td>
            <td>KODE</td>
            <td>DESKRIPSI</td>
            <td>KATEGORI</td>
            <td>NILAI</td>
            <td>DOMPET</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dompet_masuk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->nilai }}</td>
                <td>{{ $item->dompet }}</td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">{{ $item->nama }}</a>
                            <hr/>
                            <a class="dropdown-item" href="{{ route('dompet.show', $item->status_ID) }}"><i class="glyphicon glyphicon-search"></i> Detail</a>
                            <a class="dropdown-item" href="{{ route('dompet.edit', $item->dompet_id) }}"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                            @if ($item->status_dompet == 'Aktif')
                            <a class="dropdown-item" href="{{ route('dompet.status', $item->status_ID) }}"><i class="glyphicon glyphicon-times"></i> Tidak Aktif</a>
                            @else
                            <a class="dropdown-item" href="{{ route('dompet.status', $item->status_ID) }}"><i class="glyphicon glyphicon-check"></i> Aktif</a>
                            @endif
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

