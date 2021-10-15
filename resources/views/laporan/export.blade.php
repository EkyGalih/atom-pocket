<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Transaksi</title>
</head>
<body>

   <div class="container-fluid">
        <div id="printable">
            <center>
                <table>
                    <tr>
                        <td colspan="10" style="text-align: center; font-size 20px; font-weight: bold;">RIWAYAT TRANSAKSI</td>
                    </tr>
                    <tr>
                        <td colspan="10" style="text-align: center; font-size 12px;">{{ $tanggal }}</td>
                    </tr>
                </table>
            </center>
            <center>
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">#</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">TANGGAL</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">KODE</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">DESKRIPSI</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">DOMPET</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">KATEGORI</th>
                            <th style="font-size: 12px; font-weight: bold; text-align: center; border: solid;">NILAI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($laporan as $item)
                            <tr>
                                <td style="font-size: 12px; border: solid; text-align: center;">{{ $loop->iteration }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->tanggal }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->kode }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->deskripsi }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->nama_dompet }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->nama_kategori }}</td>
                                <td style="font-size: 12px; border: solid; text-align: left;">{{ $item->status_transaksi == 'Masuk' ? '(+) ' : '(-) ' }}{{ number_format($item->nilai) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </center>
            <table>
                <tr>
                    <td></td>
                    <td>Total Uang Masuk</td>
                    <td>:</td>
                    <td>{{ number_format($total_masuk) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Uang Keluar</td>
                    <td>:</td>
                    <td>{{ number_format($total_keluar) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </table>
        </div>
   </div>
</body>
</html>
