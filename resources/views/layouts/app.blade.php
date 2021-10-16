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
            <h1><a href="/" style="color: #fff;">DOMPET EKY GALIH GUNANDA</a></h1>
        </div>
        <div class="row">
            <div class="col-3 col-m-5">
                <div id="silebar">
                    <div id="judul_silebar">
                        MENU
                    </div>
                    <nav class="navbar navbar-dark bg-primary isi_silebar">
                        <div>
                            <ul class="navbar-nav mr-auto">
                                <li class="dropdown @yield('menu-master')">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master</a>

                                    <ul class="dropdown-menu @yield('show-menu-master')">

                                        <li class="dropdown-item @yield('show-dompet')"><a href="{{ route('dompet') }}">Dompet</a></li>
                                        <li class="dropdown-item @yield('show-kategori')"><a href="{{ route('kategori') }}">Kategori</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown @yield('menu-transaksi')">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transaksi</a>

                                    <ul class="dropdown-menu @yield('show-menu-transaksi')">

                                        <li class="dropdown-item @yield('show-dompet_masuk')"><a href="{{ route('dompet_masuk') }}">Dompet Masuk</a></li>
                                        <li class="dropdown-item @yield('show-dompet_keluar')"><a href="{{ route('dompet_keluar') }}">Dompet Keluar</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown @yield('menu-laporan')">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
                                    <ul class="dropdown-menu @yield('show-menu-laporan')">
                                        <li class="dropdown-item @yield('show-laporan')"><a href="{{ route('laporan') }}">Laporan Transaksi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
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
    @include('layouts.master.js')
    @yield('additional-js')
</body>
</html>
