<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.atomic.id/images/logo/logo_og.png">
    <title>@yield('title')</title>
    @yield('additional-css')
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
                            <li>Master</li>
                            <ul>
                                <li><a href="{{ route('dompet') }}">Dompet</a></li>
                                <li><a href="{{ route('kategori') }}">Kategori</a></li>
                            </ul>
                            <li>Transaksi</li>
                            <ul>
                                <li><a href="{{ route('dompet_masuk') }}">Dompet Masuk</a></li>
                                <li><a href="{{ route('dompet_keluar') }}">Dompet Keluar</a></li>
                            </ul>
                            <li>Laporan</li>
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
                        <div class="card">
                            <h5 class="card-header">@yield('sub_title')</h5>
                            <div class="card-body">
                              @yield('content')
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
        @include('layouts.master.footer')
    </div>
    @yield('additional-js')
    @include('layouts.master.js')
</body>
</html>
