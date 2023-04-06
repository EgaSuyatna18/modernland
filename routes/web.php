<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\BarangController;

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

route::get('/barang', [BarangController::class, 'index']);
route::post('/barang', [BarangController::class, 'store']);
route::get('/barang/{barang}/hapus', [BarangController::class, 'destroy']);
