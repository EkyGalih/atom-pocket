<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Transaksi</title>
    @include('layouts.master.css')
    <style>
        #printable { display: block; }

        @media print
        {
            #non-printable { display: none; }
            #printable { display: block; }
        }
    </style>
</head>
<body>

   <div class="container-fluid">
       <div id="non-printable">
           <hr/>
           <button onclick="window.print()" class="btn btn-info btn-sm">Print</button>
           <a href="{{ route('laporan') }}" class="btn btn-primary btn-sm">Close</a>
           <br/>
        </div>
        <div id="printable">
            <h4 style="text-align: center;">Riwayat Transaksi</h4>
            <p style="text-align: center">{{ $tanggal }}</p>
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

            <table style="float: right;">
                <tr>
                    <td>Total Uang Masuk</td>
                    <td>:</td>
                    <td>{{ number_format($total_masuk) }}</td>
                </tr>
                <tr>
                    <td>Total Uang Keluar</td>
                    <td>:</td>
                    <td>{{ number_format($total_keluar) }}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </table>
        </div>
   </div>

   @include('layouts.master.js')
</body>
</html>
