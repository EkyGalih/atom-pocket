@extends('layouts.app')

{{-- konfigurasi agar menu navbar tetap terbuka ketika halaman yang dipilih masih aktif --}}
@section('menu-master', 'show')
@section('show-menu-master', 'show')
@section('show-dompet', 'active')

@section('title', 'Dompet')

@section('sub_title')
<div class="row">
    <div class="col-9 col-m-1">
        <h5 class="sub_title">DOMPET - <span style="font-size: 12px;">{{$status == "" ? 'Aktif' : $status}}</span></h5>
    </div>
    <div class="col-3 col-m-1">
        <h5 class="sub_title btn-group">

            <a href="{{ route('dompet.create') }}" class="btn btn-primary btn-sm">Buat Baru</a> {{-- tombol buat dompet baru --}}

            {{-- Membuat Fitur Filter Data dengan kondisi Aktif dan Tidak Aktif --}}
            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-info btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    {{--  koding yang secara dinamis mengikuti nilai $status --}}
                    {{ $status == 'Tidak Aktif' ? 'Tidak Aktif' : 'Aktif' }}
                    ({{ $status == null ? $dompet->where('status_dompet', '=', 'Aktif')->count() : $dompet->where('status_dompet', '=', $status)->count() }})

                </a>
                <div class="dropdown-menu">
                    {{-- Buat Kondisi untuk menampilkan link Aktif jika status Tidak Aktif, dan link Tidak Aktif jika status Aktif --}}
                    @if ($status == 'Aktif')
                        <a href="{{ route('dompet', 'Tidak Aktif') }}" class="dropdown-item btn btn-info btn-sm">Tidak Aktif ( {{ $dompet->where('status_dompet', '=', 'Tidak Aktif')->count() }} )</a>
                    @elseif ($status == 'Tidak Aktif')
                        <a href="{{ route('dompet', 'Aktif') }}" class="dropdown-item btn btn-info btn-sm">Aktif ( {{ $dompet->where('status_dompet', '=', 'Aktif')->count() }} )</a>
                    @else
                        <a href="{{ route('dompet', 'Tidak Aktif') }}" class="dropdown-item btn btn-info btn-sm">Tidak Aktif ( {{ $dompet->where('status_dompet', '=', 'Tidak Aktif')->count() }} )</a>
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
            <td>REFERENSI</td>
            <td>DESKRIPSI</td>
            <td>STATUS</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dompet as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->referensi }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->status_dompet }}</td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-header" href="#">{{ $item->nama }}</a>
                            <a class="dropdown-item" href="{{ route('dompet.show', $item->status_ID) }}"><i class="fa fa-search"></i> Detail</a>
                            <a class="dropdown-item" href="{{ route('dompet.edit', $item->dompet_id) }}"><i class="fa fa-pencil"></i> Ubah</a>
                            @if ($item->status_dompet == 'Aktif')
                            <a class="dropdown-item" href="{{ route('dompet.status', $item->status_ID) }}"><i class="fa fa-times"></i> Tidak Aktif</a>
                            @else
                            <a class="dropdown-item" href="{{ route('dompet.status', $item->status_ID) }}"><i class="fa fa-check"></i> Aktif</a>
                            @endif
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('additional-js')
@endsection
