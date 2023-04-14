@extends('layouts.master4')
@section('content')
<form action="/keranjang" method="post" id="keranjangForm">
    @csrf    
</form>
<div class="container">
    <h1>Keranjang</h1>
    <div class="row">
        <div class="col-8">
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="semua">
                    <label class="form-check-label" for="semua">
                        Pilih Semua
                    </label>
                </div>
                <a href="/keranjang/hapus_semua" class="btn btn-danger">Hapus Semua</a>
            </div>
            <hr>
            @foreach ($keranjangs as $keranjang)
                <div class="bg-secondary border border-1 shadow shadow-lg p-4 rounded row">
                    <div class="col-1">
                        <input class="form-check-input p-3 my-3" type="checkbox" value="{{ $keranjang->id }}" name="k[{{ $loop->index }}]" form="keranjangForm">
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('/storage/' . $keranjang->barang->foto) }}" class="w-100 img-fluid p-4">
                    </div>
                    <div class="col-8">
                        <p class="text-white">{{ $keranjang->barang->nama_barang }}</p>
                        <p class="text-white">Rp. {{ number_format($keranjang->total) }}</p>
                        <p class="text-white">Toko: {{ $keranjang->barang->toko->nama_toko }}</p>
                        <p class="text-white">Catatan: </p>
                        <p class="text-white">{{ $keranjang->catatan }}</p>
                        <div class="text-end">
                            <form action="/keranjang/{{ $keranjang->id }}/hapus" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-between">
                <b>Total Belanja</b>
                <p id="totalHarga">Total Harga</p>
            </div>
            <button type="submit" class="btn btn-success" form="keranjangForm">Bayar</button>
        </div>
    </div>
</div>

<script>
        document.getElementById('semua').addEventListener("change", (event) => {
            var keranjangs = document.getElementsByTagName('input');
            for (var keranjang of keranjangs) {
                keranjang.checked = semua.checked;
            }
        });

    function updateTotal() {
        var checkboxes = document.querySelectorAll('input[type=checkbox][name^=k]:checked');
        var totalHarga = 0;
        checkboxes.forEach((checkbox) => {
            var harga = checkbox.closest('.bg-secondary').querySelector('.text-white:nth-of-type(2)').textContent;
            harga = harga.replace(/\D/g, '');
            totalHarga += parseInt(harga);
        });
        document.getElementById('totalHarga').textContent = 'Rp. ' + totalHarga.toLocaleString();
    }

    // update total saat halaman dimuat
    updateTotal();

    // update total saat checkbox diubah
    var checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', (event) => {
            updateTotal();
        });
    });
</script>
@endsection