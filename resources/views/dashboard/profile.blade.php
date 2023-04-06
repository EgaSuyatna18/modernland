@extends('layouts.master2')
@section('content')
    <div class="container border border-1 shadow shadow-lg rounded p-4 row">
        <div class="col-3">
            <img src="{{ (!isset(auth()->user()->toko->foto) || auth()->user()->toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . auth()->user()->toko->foto) }}" class="w-100 img-fluid">
            <form action="/toko/update/foto" method="post" id="fotoForm" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <input type="file" name="foto" class="form-control" onchange="fotoForm.submit()">
                </div>
            </form>
        </div>
        <div class="col-8">
            <form action="/toko/update" method="post">
                @csrf
                <div class="mb-3">
                    <label>Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control" value="{{ (isset($toko)) ? $toko->nama_toko : '' }}">
                </div>
                <div class="mb-3">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control" value="{{ (isset($toko)) ? $toko->nama_pemilik : '' }}">
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="number" name="no_telepon" class="form-control" value="{{ (isset($toko)) ? $toko->no_telepon : '' }}">
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="{{ (isset($toko)) ? $toko->kategori : '' }}">
                </div>
                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ (isset($toko)) ? $toko->lokasi : '' }}">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection