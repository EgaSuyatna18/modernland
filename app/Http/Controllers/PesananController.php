<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananBaru;
use App\Models\PesananSiap;
use App\Models\PesananSelesai;

class PesananController extends Controller
{
    function pesananBaru() {
        $pesanans = PesananBaru::with(['user', 'barang.toko'])->whereHas('barang.toko', function ($query) {
            return $query->where('user_id', '=', auth()->user()->id);
        })->get();
        return view('dashboard.pesanan_baru', [
            'title' => 'Pesanan Baru',
            'pesanans' => $pesanans
        ]);
    }

    function pesananSiap() {
        $pesanans = PesananSiap::with(['user', 'barang'])->whereHas('barang.toko', function ($query) {
            return $query->where('user_id', '=', auth()->user()->id);
        })->get();
        return view('dashboard.pesanan_siap', [
            'title' => 'Pesanan Siap',
            'pesanans' => $pesanans
        ]);
    }

    function pesananSelesai() {
        $pesanans = PesananSelesai::with(['user', 'barang'])->whereHas('barang.toko', function ($query) {
            return $query->where('user_id', '=', auth()->user()->id);
        })->get();
        return view('dashboard.pesanan_selesai', [
            'title' => 'Pesanan Selesai',
            'pesanans' => $pesanans
        ]);
    }

    function siap(PesananBaru $baru) {
        PesananSiap::create([
            'user_id' => $baru->user_id,
            'barang_id' => $baru->barang_id,
            'jumlah' => $baru->jumlah,
            'total' => $baru->total,
            'catatan' => $baru->catatan,
            'metode' => $baru->metode,
        ]);

        $baru->delete();

        return redirect('/pesanan/baru')->with('notify', 'Berhasil Terima Pesanan.');
    }

    function selesai(PesananSiap $siap) {
        PesananSelesai::create([
            'user_id' => $siap->user_id,
            'barang_id' => $siap->barang_id,
            'jumlah' => $siap->jumlah,
            'total' => $siap->total,
            'catatan' => $siap->catatan,
            'metode' => $siap->metode,
            'waktu_pengambilan' => $siap->waktu_pengambilan
        ]);

        $siap->delete();

        return redirect('/pesanan/siap')->with('notify', 'Berhasil Konfirmasi Pengambilan.');
    }
}
