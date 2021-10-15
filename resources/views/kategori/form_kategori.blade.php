@extends('layouts.app')

@section('title', 'Buat Dompet Baru')

@section('additional-css')
<link rel="stylesheet" href="{{ asset('DataTables/dataTables.min.css') }}">
@endsection

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <div class="sub_title">DOMPET - <sub>@if (isset($edit_dompet)) Ubah Dompet @else Buat Baru @endif</sub></div> {{-- Membuat kondisi agar title menyesuaikan dengan halaman yang di akses --}}
    </div>
    <div class="col-4 col-m-4">
        <div class="sub_title btn-group">
            <a href="{{ route('dompet') }}" class="btn btn-primary btn-sm">Kelola Dompet</a>
        </div>
    </div>
</div>
@if (isset($edit_kategori))

<form action="{{ route('kategori.update', $edit_kategori->kategori_id) }}" method="POST">
    @csrf
    @method('PUT')  {{-- Untuk edit data, tambahkan method PUT untuk membedakan isian baru dengan pembaharuan --}}

    <div class="row">

        <div class="col-6">
           <div class="form-group">
            <label for="nama">Nama <sup style="color: red;">*</sup> </label>
            <input type="text" name="nama" value="{{ $edit_kategori->nama }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="alert -alert-danger">
                    {{ $message }}
                </div>
            @enderror
           </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $edit_kategori->deskripsi }}</textarea>
            @error('deskripsi')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4 form-group">
            <label for="status">Status</label>
            <select name="status_kategori" class="form-control">
                <option value="Aktif" {{ $edit_kategori->status_dompet == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ $edit_kategori->status_dompet == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

    </div>

    <button type="submit" class="btn btn-primary btn-md">
        Simpan
    </button>

</form>

@else

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-6">
           <div class="form-group">

            <label for="nama">Nama <sup style="color: red;">*</sup> </label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
            @error('nama')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

           </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status_kategori" class="form-control">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary btn-md">
        Simpan
    </button>

</form>

@endif
@endsection

@section('additional-js')
<script src="{{ asset('DataTables/dataTables.min.js') }}"></script>
@endsection
