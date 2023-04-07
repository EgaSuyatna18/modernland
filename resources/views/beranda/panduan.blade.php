@extends('layouts.master4')
@section('content')
<div class="text-center bg-image rounded-3 d-flex justify-content-evenly align-content-around flex-wrap" style="background-image: url('/assets/img/hero.jpeg'); height: 400px;">
    <div class="bg-light rounded" style="width: 10%;">
        <img src="/assets/img/pesan.png" class="img-fluid" style="width: 80%;">
    </div>
    <div class="bg-light rounded" style="width: 10%;">
        <img src="/assets/img/bayar.png" class="img-fluid" style="width: 80%;">
    </div>
    <div class="bg-light rounded" style="width: 10%;">
        <img src="/assets/img/ambil.png" class="img-fluid" style="width: 80%;">
    </div>
</div>

<div class="container d-flex justify-content-evenly">
    <div class="bg-light rounded text-center" style="width: 20%;">
        <img src="/assets/img/pesan.png" class="img-fluid" style="width: 80%;">
        <p class="my-1">Pesan</p>
    </div>
    <img src="/assets/img/panah-kanan.png" class="img-fluid" style="width: 5%;">
    <div class="bg-light rounded text-center" style="width: 20%;">
        <img src="/assets/img/bayar.png" class="img-fluid" style="width: 80%;">
        <p class="my-1">Bayar</p>
    </div>
    <img src="/assets/img/panah-kanan.png" class="img-fluid" style="width: 5%;">
    <div class="bg-light rounded text-center" style="width: 20%;">
        <img src="/assets/img/ambil.png" class="img-fluid" style="width: 80%;">
        <p class="my-1">Ambil</p>
    </div>
</div>
@endsection