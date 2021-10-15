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
                                <div class="input-group-text"><i class="glyphicon glyphicon-calendar"></i></div>
                            </div>
                            <input type="text" name="tgl_awal" class="form-control datepicker">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="glyphicon glyphicon-calendar"></i></div>
                            </div>
                            <input type="text" name="tgl_akhir" class="form-control datepicker">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="status">Status</label><br/>
                        <input type="checkbox" value="Masuk" name="status[]"> Tampilkan Uang Masuk <br/>
                        <input type="checkbox" value="Keluar" name="status[]"> Tampilkan Uang Keluar
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

            <button type="submit" class="btn btn-primary btn-md">Buat laporan</button>
            <button type="submit" class="btn btn-primary btn-md">Buat Ke Excel</button>

           </form>
        </div>
    </div>
</div>
@endsection
@section('additional-js')
@endsection
