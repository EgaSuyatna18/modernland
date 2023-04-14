@extends('layouts.master4')
@section('content')
    <div class="container row m-auto mt-5">
        <div class="col-7">
            <h1>Checkout</h1>
            <p>Alamat Pengambilan</p>
            <hr>
            @php $total = 0; @endphp
            @foreach ($keranjangs as $keranjang)
            @php $total += $keranjang->total; @endphp
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('/storage/' . $keranjang->barang->foto) }}" class="w-100 img-fluid">
                    </div>
                    <div class="col-9">
                        <p>{{ $keranjang->barang->nama_barang }}</p>
                        <p>Harga: Rp. {{ number_format($keranjang->total) }}</p>
                        <p>Catatan: </p>
                        <p>{{ $keranjang->catatan }}</p>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="d-flex justify-content-between">
                <b>SUBTOTAL</b>
                <p>Rp. {{ number_format($total) }}</p>
            </div>
        </div>
        <div class="col-4 offset-1">
            <div class="border border-1 rounded p-4">
                <p>Ringkasan Belanja</p>
                    @foreach ($keranjangs as $keranjang)
                        <div class="d-flex justify-content-between">
                            <p>{{ $keranjang->barang->nama_barang . ' (' . $keranjang->jumlah . ') ' }}</p>
                            <p>{{ ' Rp. ' . number_format($keranjang->total) }}</p>
                        </div>
                    @endforeach
                    <hr>
                <div class="d-flex justify-content-between">
                    <b class="d-inline">Total Tagihan</b>
                    <p class="ms-auto d-inline">Rp. {{ number_format($total) }}</p>
                </div>
                <button type="button" class="btn btn-success form-control" data-bs-toggle="modal" data-bs-target="#pembayaranModal">
                    Pilih Pembayaran
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pembayaranModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="pembayaranModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/keranjang/proses" method="post" id="pembayaranForm">
                    @csrf
                    @foreach ($keranjangs as $keranjang)
                        <input type="hidden" name="k[{{ $loop->index }}]" value="{{ $keranjang->id }}">
                    @endforeach
                    <div class="mb-3 d-flex justify-content-evenly">
                        <input type="radio" class="btn-check" name="metode" value="gopay" id="gopay" autocomplete="off">
                        <label class="btn btn-outline-success" for="gopay">Gopay</label>
                        <input type="radio" class="btn-check" name="metode" value="ovo" id="ovo" autocomplete="off">
                        <label class="btn btn-outline-success" for="ovo">OVO</label>
                        <input type="radio" class="btn-check" name="metode" value="transfer" id="transfer" autocomplete="off">
                        <label class="btn btn-outline-success" for="transfer">Transfer</label>
                    </div>
                </form>
                <hr>
                <p>Ringkasan Belanja</p>
                    @foreach ($keranjangs as $keranjang)
                        <div class="d-flex justify-content-between">
                            <p>{{ $keranjang->barang->nama_barang . ' (' . $keranjang->jumlah . ') ' }}</p>
                            <p>{{ ' Rp. ' . number_format($keranjang->total) }}</p>
                        </div>
                    @endforeach
                    <hr>
                <div class="text-center">
                    <h3>Total: Rp. {{ number_format($total) }}</h3>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" form="pembayaranForm">Submit</button>
            </div>
        </div>
        </div>
    </div>
@endsection