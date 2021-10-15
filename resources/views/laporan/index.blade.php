@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('sub_title')
<div class="row">
    <div class="col-8 col-m-1">
        <h5 class="sub_title">LAPORAN <sub>Transaksi</sub> </h5>
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
                            <input type="text" name="tgl_awal" class="form-control datepicker @error('tgl_awal') is-invalid @enderror">
                            @error('tgl_awal')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" name="tgl_akhir" class="form-control datepicker @error('tgl_akhir') is-invalid @enderror">
                            @error('tgl_akhir')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="status">Status</label><br/>
                        <input type="checkbox" value="Masuk" name="status[]" checked> Tampilkan Uang Masuk <br/>
                        <input type="checkbox" value="Keluar" name="status[]" checked> Tampilkan Uang Keluar
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