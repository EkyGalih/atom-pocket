@extends('layouts.app')

@section('title', 'Buat Dompet Keluar Baru')

@section('additional-css')
<link rel="stylesheet" href="{{ asset('DataTables/dataTables.min.css') }}">
@endsection

@section('sub_title')
<div class="row">
    <div class="col-10 col-m-1">
        <div class="sub_title">DOMPET KELUAR- <sub>@if (isset($edit_dompet)) Ubah Dompet Keluar @else Buat Baru @endif</sub></div> {{-- Membuat kondisi agar title menyesuaikan dengan halaman yang di akses --}}
    </div>
    <div class="col-2 col-m-4">
        <div class="sub_title btn-group">
            <a href="{{ route('dompet_keluar') }}" class="btn btn-primary btn-sm">Kelola Dompet Keluar</a>
        </div>
    </div>
</div>

<form action="{{ route('dompet_keluar.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-3">
           <div class="form-group">

            <label for="kode">Kode : </label>
            <input type="text" name="kode" value="{{ App\Helper\helper::kode_out() }}" class="form-control @error('kode') is-invalid @enderror">
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
            <input type="text" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" readonly>
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
                <label for="nilai">Nilai : <sup style="color: red;">*</sup> </label>
                <input type="text" name="nilai" class="form-control @error('nilai') is-invalid @enderror" placeholder="0">
                @error('nilai')
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
                <label for="deskripsi">Deskripsi </label>
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

@endsection

@section('additional-js')
<script src="{{ asset('DataTables/dataTables.min.js') }}"></script>
@endsection
