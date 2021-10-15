@extends('layouts.app')
@section('title')
Dompet Eky Galih Gunanda
@endsection
@section('content')
<div class="jumbotron">
    <h1 class="display-4">Hallo, Atomic!</h1>
    <p class="lead">Aplikasi yang dinamakan "dompet" untuk management keuangan kamu.</p>
    <hr class="my-4">
    <p>Terima kasih atas kesempatan dan waktu yang telah diberikan untuk mengikuti tes ini. <br/> Salam Hormat<br/>Eky Galih Gunanda</p>
    <a class="btn btn-primary btn-lg" href="{{ route('dompet') }}" role="button">Mulai</a>
  </div>
@endsection
