@extends('layouts.app')

{{-- konfigurasi agar menu navbar tetap terbuka ketika halaman yang dipilih masih aktif --}}
@section('menu-laporan', 'show')
@section('show-menu-laporan', 'show')
@section('show-laporan', 'active')

@section('title', 'Laporan Transaksi')

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <h5 class="sub_title">LAPORAN - <span>Transaksi</span> </h5>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h5>Transaksi</h5>
        </div>
        <div class="card-body">
           <form action="{{ route('laporan.show') }}" method="POST">
               @csrf

               <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" name="tgl_awal" value="{{ old('tgl_awal') }}" class="form-control datepicker @error('tgl_awal') is-invalid @enderror">
                        </div>
                        @error('tgl_awal')
                            <div class="alert alert-danger message">
                                <i class="fa fa-warning"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" name="tgl_akhir" value="{{ old('tgl_akhir') }}" class="form-control datepicker @error('tgl_akhir') is-invalid @enderror">
                        </div>
                        @error('tgl_akhir')
                            <div class="alert alert-danger message">
                                <i class="fa fa-warning"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="control-group">
                        <label for="status">Status</label><br/>
                        <label class="control control--checkbox">Tampilkan Uang Masuk
                            <input type="checkbox" value="Masuk" name="status[]" checked="checked"/>
                            <div class="control__indicator"></div>
                        </label>
                        <label class="control control--checkbox">Tampilkan Uang Keluar
                            <input type="checkbox" value="Keluar" name="status[]" checked="checked"/>
                            <div class="control__indicator"></div>
                        </label>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kategori">Kategori :</label>
                        <select name="kategori_id" class="form-control">
                            <option value="all">Semua</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->kategori_id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="dompet">Dompet :</label>
                        <select name="dompet_id" class="form-control">
                            <option value="all">Semua</option>
                            @foreach ($dompet as $items)
                                <option value="{{ $items->dompet_id }}">{{ $items->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <input type="submit" class="btn btn-primary btn-md" name="click" value="Buat Laporan">
            <input type="submit" class="btn btn-primary btn-md" name="click" value="Buat Ke Excel">

           </form>
        </div>
    </div>
</div>
@endsection
@section('additional-js')
@endsection
