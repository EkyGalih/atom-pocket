@extends('layouts.app')

@section('title', 'Dompet Masuk')

@section('sub_title')
<div class="row">
    <div class="col-10 col-m-1">
        <h5 class="sub_title">DOMPET MASUK</h5>
    </div>
    <div class="col-2 col-m-1">
        <h5 class="sub_title btn-group">
            <a href="{{ route('dompet_masuk.create') }}" class="btn btn-primary btn-sm">Buat Baru</a>
        </h5>
    </div>
</div>
<table class="table table-hover-table-striped dompet">
    <thead class="table-primary">
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
                <td>{{ $item->nama_dompet }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

