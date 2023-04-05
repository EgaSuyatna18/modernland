@extends('layouts.master1')
@section('content')
<div class="container-fluid text-center d-flex align-content-around flex-wrap" style="height: 780px;">
    <div class="container">
        <h1>Halo, <br>Kamu Siapa?</h1>
    </div>

    <div class="container m-auto d-flex justify-content-between">
        <a href="/login/pembeli" class="btn w-25 p-3" style="background-color: #748cdc;">PEMBELI</a>
        <a href="/login/penjual" class="btn w-25 p-3" style="background-color: #748cdc;">PENJUAL</a>
    </div>

    <div class="container">
        <h1>Pasar Modernland</h1>
    </div>
</div>
@endsection