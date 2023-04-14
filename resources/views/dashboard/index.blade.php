@extends('layouts.master2')
@section('content')
{{-- {{ dd($pendapatan) }} --}}
{{-- {{ dd($terjual) }} --}}
{{-- {{ dd($pembeli) }} --}}
    <div class="container border border-1 shadow shadow-lg rounded p-4 row m-auto">
        <div class="col-3">
            <img src="{{ (!isset(auth()->user()->toko->foto) || auth()->user()->toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . auth()->user()->toko->foto) }}" class="w-100 img-fluid">
        </div>
        <div class="col-8">
            <table>
                <tr>
                    <td><h3>Nama Toko</h3></td>
                    <td><h3> : {{ $toko->nama_toko }}</h3></td>
                </tr>
                <tr>
                    <td><h3>Nama Pemilik</h3></td>
                    <td><h3> : {{ $toko->nama_pemilik }}</h3></td>
                </tr>
                <tr>
                    <td><h3>No Telepon</h3></td>
                    <td><h3> : {{ $toko->no_telepon }}</h3></td>
                </tr>
                <tr>
                    <td><h3>Email</h3></td>
                    <td><h3> : {{ auth()->user()->email }}</h3></td>
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

    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Pendapatan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $pendapatan }}
                    <div class="small text-white"><i class="fas fa-dollar"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Terjual</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $terjual }}
                    <div class="small text-white"><i class="fas fa-shopping-bag"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Jumlah Pembeli</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $pembeli }}
                    <div class="small text-white"><i class="fas fa-users"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection