<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.atomic.id/images/logo/logo_og.png">
    <title>@yield('title')</title>
    @include('layouts.master.css')
</head>
<body>
    <div id="wrap">
        <div id="header">
            <h1>DOMPET EKY GALIH GUNANDA</h1>
        </div>
        <div class="row">
            <div class="col-3 col-m-5">
                <div id="silebar">
                    <div id="judul_silebar">
                        MENU
                    </div>
                    <div id="isi_silebar">
                        <ul>
                            <li><a href="#">MASTER</a></li>
                            <ul>
                                <li><a href="#">Dompet</a></li>
                                <li><a href="#">Kategori</a></li>
                            </ul>
                            <li><a href="#">TRANSAKSI</a></li>
                            <ul>
                                <li><a href="#">Dompet Masuk</a></li>
                                <li><a href="#">Dompet keluar</a></li>
                            </ul>
                            <li><a href="#">LAPORAN</a></li>
                            <ul>
                                <li><a href="#">Laporan Transaksi</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9 col-m-7">
                <div id="konten">
                    <div class="col-12 col-m-12">
                        <h2>@yield('sub_title')</h2>
                        <p>Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint. Suspendisse venenatis,Lorem ipsum dolor sit magna dolor.</p>
                        <p>Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint. Suspendisse venenatis,Lorem ipsum dolor sit magna dolor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div id="footer">
                <div id="text">
                    Maju Bersama Atomic Indonesia
                </div>
            </div>
        </div>
    </div>
@include('layouts.master.js')
</body>
</html>
