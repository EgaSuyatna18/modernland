@extends('layouts.master4')
@section('content')
    <div class="container mt-5">
        @foreach ($pemesanans as $pemesanan)
                <div class="bg-secondary border border-1 shadow shadow-lg p-4 rounded row">
                    <div class="col-3">
                        <img src="{{ asset('/storage/' . $pemesanan->barang->foto) }}" class="w-100 img-fluid p-4">
                    </div>
                    <div class="col-8">
                        <p class="text-white">{{ $pemesanan->barang->nama_barang }}</p>
                        <p class="text-white">Rp. {{ number_format($pemesanan->total) }}</p>
                        <p class="text-white">Toko: {{ $pemesanan->barang->toko->nama_toko }}</p>
                        <p class="text-white">Catatan: </p>
                        <p class="text-white">{{ $pemesanan->catatan }}</p>
                        <div class="text-end">
                            <p>Batas Response</p>
                            <p class="btn btn-success">{{ $pemesanan->batas_response }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection