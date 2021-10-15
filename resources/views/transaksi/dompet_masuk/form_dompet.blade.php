@extends('layouts.app')

@section('title', 'Buat Dompet Masuk Baru')

@section('additional-css')
<link rel="stylesheet" href="{{ asset('DataTables/dataTables.min.css') }}">
@endsection

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <div class="sub_title">DOMPET MASUK- <sub>@if (isset($edit_dompet)) Ubah Dompet Masuk @else Buat Baru @endif</sub></div> {{-- Membuat kondisi agar title menyesuaikan dengan halaman yang di akses --}}
    </div>
    <div class="col-4 col-m-4">
        <div class="sub_title btn-group">
            <a href="{{ route('dompet') }}" class="btn btn-primary btn-sm">Kelola Dompet Masuk</a>
        </div>
    </div>
</div>
@if (isset($edit_dompet))

<form action="{{ route('dompet.update', $edit_dompet->dompet_id) }}" method="POST">
    @csrf
    @method('PUT')  {{-- Untuk edit data, tambahkan method PUT untuk membedakan isian baru dengan pembaharuan --}}

    <div class="row">

        <div class="col-6">
           <div class="form-group">
            <label for="nama">Nama <sup style="color: red;">*</sup> </label>
            <input type="text" name="nama" value="{{ $edit_dompet->nama }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="alert -alert-danger">
                    {{ $message }}
                </div>
            @enderror
           </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="tanggal">Referensi</label>
            <input type="text" name="referensi" value="{{ $edit_dompet->referensi }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $edit_dompet->deskripsi }}</textarea>
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
            <select name="status_dompet" class="form-control">
                <option value="Aktif" {{ $edit_dompet->status_dompet == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ $edit_dompet->status_dompet == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

    </div>

    <button type="submit" class="btn btn-primary btn-md">
        Simpan
    </button>

</form>

@else

<form action="{{ route('dompet_masuk.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-3">
           <div class="form-group">

            <label for="kode">Kode : </label>
            <input type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" placeholder="WINxxxx">
            @error('kode')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

           </div>
        </div>

        <div class="col-3">

           <div class="form-group">
            <label for="tanggal">Tanggal :</label>
            <input type="text" name="tanggal" value="{{ old('tanggal') }}" placeholder="{{ date('Y-m-d') }}" class="form-control @error('deskripsi') is-invalid @enderror">
           </div>

        </div>

        <div class="col-3">

            <div class="form-group">
             <label for="kategori">Kategori :</label>
                <select name="kategori_id" class="form-control">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

         </div>

        <div class="col-3">

            <div class="form-group">
             <label for="dompet">Dompet : <sup style="color: red;">*</sup> </label>
                <select name="dompet_id" class="form-control">
                    @foreach ($dompet as $items)
                        <option value="{{ $items->dompet_id }}">{{ $items->nama }}</option>
                    @endforeach
                </select>
            </div>

         </div>
    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="text" name="nilai">
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

    <button type="submit" class="btn btn-primary btn-md">
        Simpan
    </button>

</form>

@endif
@endsection

@section('additional-js')
<script src="{{ asset('DataTables/dataTables.min.js') }}"></script>
@endsection
