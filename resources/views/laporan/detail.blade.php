<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Transaksi</title>
    @include('layouts.master.css')
</head>
<body>

   <div class="container-fluid">
        <hr/>
        <button class="btn btn-info btn-sm">Print</button>
        <a href="{{ route('laporan') }}" class="btn btn-primary btn-sm">Close</a>
        <br/>
        <h4 style="text-align: center;">Riwayat Transaksi</h4>
        <p style="text-align: center"></p>
        <table class="table table-border table-hover table-striped">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>TANGGAL</th>
                    <th>KODE</th>
                    <th>DESKRIPSI</th>
                    <th>DOMPET</th>
                    <th>KATEGORI</th>
                    <th>NILAI</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->nama_dompet }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <tr>
                <td>Total Uang Masuk</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Total Uang Keluar</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
   </div>

   @include('layouts.master.js')
</body>
</html>
