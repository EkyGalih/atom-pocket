@extends('layouts.app')

{{-- konfigurasi agar menu navbar tetap terbuka ketika halaman yang dipilih masih aktif --}}
@section('menu-master', 'show')
@section('show-menu-master', 'show')
@section('show-kategori', 'active')

@section('title', 'Kategori')

@section('sub_title')
<div class="row">
    <div class="col-9 col-m-1">
        <h5 class="sub_title">KATEGORI - <span style="font-size: 12px;">{{$status == "" ? 'Aktif' : $status}}</span></h5>
    </div>
    <div class="col-3 col-m-1">
        <h5 class="sub_title btn-group">

            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Buat Baru</a>

            {{-- Membuat Fitur Filter Data dengan kondisi Aktif dan Tidak Aktif --}}
            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    {{--  koding yang secara dinamis mengikuti nilai $status --}}
                    {{ $status == 'Tidak Aktif' ? 'Tidak Aktif' : 'Aktif' }}
                    ({{ $status == null ? $kategori->where('status_kategori', '=', 'Aktif')->count() : $kategori->where('status_kategori', '=', $status)->count() }})

                </a>
                <div class="dropdown-menu">
                    {{-- Buat Kondisi untuk menampilkan link Aktif jika status Tidak Aktif, dan link Tidak Aktif jika status Aktif --}}
                    @if ($status == 'Aktif')
                    <a href="{{ route('kategori', 'Tidak Aktif') }}" class="dropdown-item btn btn-info btn-sm">Tidak Aktif ( {{ $kategori->where('status_kategori', '=', 'Tidak Aktif')->count() }} )</a>
                    @elseif ($status == 'Tidak Aktif')
                    <a href="{{ route('kategori', 'Aktif') }}" class="dropdown-item btn btn-info btn-sm">Aktif ( {{ $kategori->where('status_kategori', '=', 'Aktif')->count() }} )</a>
                    @else
                    <a href="{{ route('kategori', 'Tidak Aktif') }}" class="dropdown-item btn btn-info btn-sm">Tidak Aktif ( {{ $kategori->where('status_kategori', '=', 'Tidak Aktif')->count() }} )</a>
                    @endif
                </div>

            </div>
        </h5>
    </div>
</div>
<table class="table table-hover-table-striped dompet">
    <thead class="table-primary">
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
                            <a class="dropdown-header" href="#">{{ $item->nama }}</a>
                            <a class="dropdown-item" href="{{ route('kategori.show', $item->status_ID) }}"><i class="fa fa-search"></i> Detail</a>
                            <a class="dropdown-item" href="{{ route('kategori.edit', $item->kategori_id) }}"><i class="fa fa-pencil"></i> Ubah</a>
                            @if ($item->status_kategori == 'Aktif')
                            <a class="dropdown-item" href="{{ route('kategori.status', $item->status_ID) }}"><i class="fa fa-times"></i> Tidak Aktif</a>
                            @else
                            <a class="dropdown-item" href="{{ route('kategori.status', $item->status_ID) }}"><i class="fa fa-check"></i> Aktif</a>
                            @endif
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

