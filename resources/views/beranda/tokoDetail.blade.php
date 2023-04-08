@extends('layouts.master4')
@section('content')
<div class="container border border-1 shadow shadow-lg rounded p-4 row m-auto my-4">
    <div class="col-3">
        <img src="{{ ($toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . $toko->foto) }}" class="w-100 img-fluid">
    </div>
    <div class="col-8">
        <table>
            <tr>
                <td><h3>Nama Toko</h3></td>
                <td><h3> : {{ $toko->nama_toko }}</h3></td>
            </tr>
            <tr>
                <td><h3>Kategori</h3></td>
                <td><h3> : {{ $toko->kategori }}</h3></td>
            </tr>
            <tr>
                <td><h3>Lokasi</h3></td>
                <td><h3> : {{ $toko->lokasi }}</h3></td>
            </tr>
        </table>
    </div>
</div>

<div class="row justify-content-evenly">
    @foreach ($barangs as $barang)
      <div class="card col-4 mb-4" style="width: 18rem;">
        <img src="{{ asset('/storage/' . $barang->foto) }}" class="w-25 m-auto card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">{{ $barang->nama_barang }}</h5>
          <p class="card-text">{{ $barang->harga }}</p>
          <a href="/barang/{{ $barang->id }}/pesan" class="btn btn-primary">Pesan</a>
        </div>
      </div>
    @endforeach
</div>

<div class="container text-center">
    {{ $barangs->links() }}
  </div>
@endsection