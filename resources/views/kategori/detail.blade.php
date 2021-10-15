@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

<div class="row">
    <div class="col-10 col-m-1">
        <h5 class="sub_title">DETAIL KATEGORI</h5>
    </div>
    <div class="col-2 col-m-1">
        <h5 class="sub_title btn-group">
            <a href="{{ route('kategori') }}" class="btn btn-primary btn-sm">Kelola kategori</a>
        </h5>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <h5>Nama</h5>
        <p>{{ $show_kategori->nama }}</p>
        <br/>

        <h5>Deskripsi</h5>
        <p>{{ $show_kategori->deskripsi }}</p>
        <br/>

        <h5>Status kategori</h5>
        <p>{{ $show_kategori->status_kategori }}</p>

    </div>
</div>

@endsection
