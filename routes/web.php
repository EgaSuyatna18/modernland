<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});

route::get('/', [PageController::class, 'index'])->middleware('guest');
route::get('/login/pembeli', [PageController::class, 'loginPembeli'])->middleware('guest');
route::get('/login/penjual', [PageController::class, 'loginPenjual'])->middleware('guest');
route::get('/register/penjual', [PageController::class, 'registerPenjual'])->middleware('guest');
route::get('/register/pembeli', [PageController::class, 'registerPembeli'])->middleware('guest');

route::get('/dashboard', [DashboardController::class, 'index']);
route::get('/dashboard/profile', [DashboardController::class, 'profile']);

route::post('/toko/update/foto', [TokoController::class, 'updateFoto']);
route::post('/toko/update', [TokoController::class, 'update']);
route::get('/toko', [TokoController::class, 'toko']);
route::get('/toko/{toko}/toko', [TokoController::class, 'tokoDetail']);
route::get('/toko/{toko}/kategori', [TokoController::class, 'tokoDetail']);
route::post('/toko/cari', [TokoController::class, 'tokoCari']);

route::get('/barang', [BarangController::class, 'index']);
route::post('/barang', [BarangController::class, 'store']);
route::get('/barang/{barang}/hapus', [BarangController::class, 'destroy']);
route::get('/barang/{barang}/pesan', [BarangController::class, 'pesan']);

route::get('/beranda', [PageController::class, 'beranda']);
route::post('/beranda/cari', [PageController::class, 'berandaCari']);
route::get('/faq', [PageController::class, 'faq']);
route::get('/panduan', [PageController::class, 'panduan']);

route::get('/keranjang', [KeranjangController::class, 'keranjang']);
route::post('/keranjang/{barang}/tambah', [KeranjangController::class, 'tambah']);
route::post('/keranjang', [KeranjangController::class, 'beli']);
route::get('/keranjang/hapus_semua', [KeranjangController::class, 'hapus_semua']);
route::delete('/keranjang/{id}/hapus', [KeranjangController::class, 'hapus']);
route::post('/keranjang/proses', [KeranjangController::class, 'proses']);
route::get('/keranjang/barcode', [KeranjangController::class, 'barcode']);
route::get('/keranjang/pesanan', [KeranjangController::class, 'pesanan']);

route::get('/pesanan/baru', [PesananController::class, 'pesananBaru']);
route::get('/pesanan/{baru}/siap', [PesananController::class, 'siap']);
route::get('/pesanan/siap', [PesananController::class, 'pesananSiap']);
route::get('/pesanan/{siap}/selesai', [PesananController::class, 'selesai']);
route::get('/pesanan/selesai', [PesananController::class, 'pesananSelesai']);