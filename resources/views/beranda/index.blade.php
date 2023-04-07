@extends('layouts.master4')
@section('content')

<style>
    @media (max-width: 767px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}

	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}

	/* medium and up screens */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-end.active,
		.carousel-inner .carousel-item-next {
			transform: translateX(25%);
		}

		.carousel-inner .carousel-item-start.active, 
		.carousel-inner .carousel-item-prev {
			transform: translateX(-25%);
		}
	}

	.carousel-inner .carousel-item-end,
	.carousel-inner .carousel-item-start { 
		transform: translateX(0);
	}
</style>

<div class="text-center bg-image rounded-3" style="background-image: url('/assets/img/hero.jpeg'); height: 400px;"></div>

<div class="container-fluid d-flex justify-content-between">
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAlamat" style="background-color: #94ec8c;">
    Alamat Pasar Modernland
</button>

<form action="/beranda/cari" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="key" placeholder="Cari Toko/Barang" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
      </div>
</form>
</div>
<div class="container-fluid d-flex justify-content-between my-3">
    <h3>Toko Rekomendasi</h3>
    <a href="/toko/lihat" class="btn" style="background-color: #94ec8c;">Lihat Semua</a>
</div>
<div class="container-fluid text-center">
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide tc" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($tokos as $toko)
                    <div class="carousel-item tci @if ($loop->index == 0) active @endif">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/assets/img/frame.png" class="img-fluid">
                                </div>
                                <div class="card-img-overlay">
                                    <p>Toko ke-{{ $loop->index + 1 }}</p>
                                    <img src="{{ ($toko->foto == '/assets/img/toko-default.png') ? '/assets/img/toko-default.png' : asset('/storage/' . $toko->foto) }}" class="w-50 img-fluid">
                                    <h3>{{ $toko->nama_toko }}</h3>
                                    <h5>Kategori: {{ $toko->kategori }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>		
</div>

<h3 class="my-3">Barang Rekomendasi</h3>

<div class="container-fluid text-center" style="margin-bottom: 100px;">
    <div class="row mx-auto my-auto justify-content-center">
        <div id="barangCarousel" class="carousel slide bc" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($barangs as $barang)
                    <div class="carousel-item bci @if ($loop->index == 0) active @endif">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/assets/img/frame.png" class="img-fluid">
                                </div>
                                <div class="card-img-overlay">
                                    <p>Barang ke-{{ $loop->index + 1 }}</p>
                                    <img src="{{ asset('/storage/' . $barang->foto) }}" class="w-50 img-fluid">
                                    <h3>{{ $barang->nama_barang }}</h3>
                                    <h5>Rp. {{ number_format($barang->harga) }}</h5>
                                    <h5>Toko: {{ $barang->toko->nama_toko }}</h5>
                                    <h5>Kategori: {{ $barang->kategori }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#barangCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#barangCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>		
</div>

<!-- Modal -->
<div class="modal fade" id="modalAlamat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAlamatLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalAlamatLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15862.597527398671!2d106.85439257331714!3d-6.309709083958918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f283d4536f23%3A0x33cda3d055bd750a!2sPasar%20Induk%20Kramatjati!5e0!3m2!1sid!2sid!4v1680873133012!5m2!1sid!2sid" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let items = document.querySelectorAll('.tc .tci')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
        }
    })

    let items2 = document.querySelectorAll('.bc .bci')

        items2.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
            // wrap carousel by using first child
            next = items2[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
        }
    })
  </script>
@endsection