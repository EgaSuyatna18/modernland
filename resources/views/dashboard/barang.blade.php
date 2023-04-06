@extends('layouts.master3')
@section('content')
<div class="container border border-1 shadow shadow-lg rounded p-4 mt-4 row m-auto">
    <div class="col-3">
        <img src="{{ (!isset(auth()->user()->toko->foto) || auth()->user()->toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . auth()->user()->toko->foto) }}" class="w-100 img-fluid">
    </div>
    <div class="col-8">
        <table>
            <tr>
                <td><h3>Nama Toko</h3></td>
                <td><h3> : {{ auth()->user()->toko->nama_toko }}</h3></td>
            </tr>
            <tr>
                <td><h3>Nama Pemilik</h3></td>
                <td><h3> : {{ auth()->user()->toko->nama_pemilik }}</h3></td>
            </tr>
            <tr>
                <td><h3>No Telepon</h3></td>
                <td><h3> : {{ auth()->user()->toko->no_telepon }}</h3></td>
            </tr>
            <tr>
                <td><h3>Email</h3></td>
                <td><h3> : {{ auth()->user()->email }}</h3></td>
            </tr>
            <tr>
                <td><h3>Kategori</h3></td>
                <td><h3> : {{ auth()->user()->toko->kategori }}</h3></td>
            </tr>
            <tr>
                <td><h3>Lokasi</h3></td>
                <td><h3> : {{ auth()->user()->toko->lokasi }}</h3></td>
            </tr>
        </table>
    </div>
</div>

<div class="container my-4">
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
    Tambah
</button>
</div>

<div class="container-fluid row d-flex justify-content-evenly">
    @foreach ($barangs as $barang)
    <div class="card mb-5" style="width: 18rem;">
        <img src="{{ asset('/storage/' . $barang->foto) }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">{{ $barang->nama_barang }}</h5>
          <p class="card-text">{{ $barang->harga }}</p>
          <a href="/barang/{{ $barang->id }}/hapus" class="btn btn-danger">hapus</a>
        </div>
      </div>
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/barang" method="post" id="tambahForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control">
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" form="tambahForm">Submit</button>
        </div>
      </div>
    </div>
  </div>

@endsection