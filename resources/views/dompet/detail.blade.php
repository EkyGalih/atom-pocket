@extends('layouts.app')

{{-- konfigurasi agar menu navbar tetap terbuka ketika halaman yang dipilih masih aktif --}}
@section('menu-master', 'show')
@section('show-menu-master', 'show')
@section('show-dompet', 'active')

@section('title', 'Detail Dompet')

@section('content')

<div class="row">
    <div class="col-10 col-m-1">
        <h5 class="sub_title">DETAIL DOMPET</h5>
    </div>
    <div class="col-2 col-m-1">
        <h5 class="sub_title btn-group">
            <a href="{{ route('dompet') }}" class="btn btn-primary btn-sm">Kelola Dompet</a>
        </h5>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <h5>Nama</h5>
        <p>{{ $show_dompet->nama }}</p>
        <br/>

        <h5>Referensi</h5>
        <p>{{ $show_dompet->referensi }}</p>
        <br/>

        <h5>Deskripsi</h5>
        <p>{{ $show_dompet->deskripsi }}</p>
        <br/>

        <h5>Status Dompet</h5>
        <p>{{ $show_dompet->status_dompet }}</p>

    </div>
</div>

@endsection
