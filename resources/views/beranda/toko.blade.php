@extends('layouts.master4')
@section('content')
    <div class="container d-flex justify-content-evenly my-4 border border-1 shadow shadow-lg rounded p-4">
        @foreach ($kategoris as $kategori)
            <a href="/toko/{{ $kategori->id }}/kategori" class="btn btn-primary">{{ $kategori->kategori }}</a>
        @endforeach
    </div>

    <div class="container-fluid d-flex justify-content-end">
        <form action="/toko/cari" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="key" placeholder="Cari Toko/Barang" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
              </div>
        </form>
    </div>

    <div class="container-fluid d-flex justify-content-start my-3">
        <h3>Toko Rekomendasi</h3>
    </div>

    <div class="row justify-content-evenly">
        @foreach ($tokos as $toko)
          <div class="card col-4 mb-4" style="width: 18rem;">
            <img src="{{ ($toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . $toko->foto) }}" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $toko->nama_toko }}</h5>
              <p class="card-text">{{ $toko->kategori }}</p>
              <a href="/toko/{{ $toko->id }}/toko" class="btn btn-primary">Lihat</a>
            </div>
          </div>
        @endforeach
    </div>

    <div class="container text-center">
      {{ $tokos->links() }}
    </div>
@endsection