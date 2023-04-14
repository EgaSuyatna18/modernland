@extends('layouts.master2')
@section('content')
<div class="container mt-5">
    @foreach ($pesanans as $pesanan)
            <div class="my-3 border border-1 shadow shadow-lg p-4 rounded row">
                <p>Nama Pemesan: {{ $pesanan->user->name }}</p>
                <div class="col-3">
                    <img src="{{ asset('/storage/' . $pesanan->barang->foto) }}" class="w-100 img-fluid p-4">
                </div>
                <div class="col-8">
                    <p>{{ $pesanan->barang->nama_barang }}</p>
                    <p>Rp. {{ number_format($pesanan->total) }}</p>
                    <p>Toko: {{ $pesanan->barang->toko->nama_toko }}</p>
                    <p>Catatan: </p>
                    <p>{{ $pesanan->catatan }}</p>
                    <div class="text-end">
                        <p>Waktu Pengambilan</p>
                        <p class="btn btn-warning">{{ $pesanan->waktu_pengambilan }}</p><br>
                        <a href="/pesanan/{{ $pesanan->id }}/selesai" class="btn btn-success">Konfirmasi Pengambilan</a>
                    </div>
                </div>
            </div>
        @endforeach
</div>
@endsection