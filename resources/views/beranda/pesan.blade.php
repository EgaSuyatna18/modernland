@extends('layouts.master4')
@section('content')
<style>
    input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

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
    <div class="container m-auto row my-4">
        <div class="col-4 offset-2 bg-secondary text-center">
            <img src="{{ asset('/storage/' . $barang->foto) }}" class="w-25 img-fluid p-4">
            <p>Nama Barang: {{ $barang->nama_barang }}</p>
            <p>Kategori : {{ $barang->kategori }}</p>
            <p>Harga : Rp.{{ number_format($barang->harga) }}</p>
            <p>Deskripsi : {{ $barang->deskripsi }}</p>
        </div>
        <div class="col-4 border border-1 rounded">
            <p>Atur Pesanan</p>
            <form action="/barang/{{ $barang->id }}/keranjang" method="post">
                @csrf
                <div class="input-group">
                    <input type="button" value="-" class="button-minus" data-field="quantity">
                    <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                    <input type="button" value="+" class="button-plus" data-field="quantity">
                </div>
                <div class="mb-3">
                    <label>Catatan</label>
                    <textarea name="catatan" class="form-control"></textarea>
                </div>
                    <button type="submit" class="btn btn-success">Pesan</button>
            </form>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-start my-3">
        <h3>Barang Rekomendasi</h3>
    </div>

    @if ($barangs->count())
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
                                    <img src="{{ asset('/storage/' . $barang->foto) }}" class="w-25 img-fluid">
                                    <h3>{{ $barang->nama_barang }}</h3>
                                    <h5>Rp. {{ number_format($barang->harga) }}</h5>
                                    <h5>Toko: {{ $barang->toko->nama_toko }}</h5>
                                    <h5>Kategori: {{ $barang->kategori }}</h5>
                                    <a href="/barang/{{ $barang->id }}/pesan" class="btn btn-primary">Pesan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev bg-success w-aut" style="width: 10%;" href="#barangCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-success w-aut" style="width: 10%;" href="#barangCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>		
</div>
@else
<div class="container text-center">
    <h1>Barang Tidak Ada</h1>
</div>
@endif

<script src="/assets/jquery/jquery.js"></script>
<script>
    function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});

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