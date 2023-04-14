@extends('layouts.master4')
@section('content')
<div class="mt-5 d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="border border-3 border-success"></div>
        <div class="card  bg-white shadow p-5">
            <div class="mb-4 text-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ url()->to('/keranjang/pesanan') }}" class="w-75">
            </div>
            <div class="text-center">
                <h1>Scan Pesanan Anda !</h1>
                <p>Link akan mengarah ke halaman pemesanan anda.</p>
                <a href="/keranjang/pesanan" class="btn btn-outline-success">Langsung Tanpa Scan</a>
            </div>
        </div>
    </div>
</div>
@endsection