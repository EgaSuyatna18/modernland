<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\PesananBaru;
use App\Models\PesananSiap;
use App\Models\PesananSelesai;

class KeranjangController extends Controller
{
    function keranjang() {
        return view('beranda.keranjang', [
            'title' => 'Keranjang',
            'keranjangs' => Keranjang::with(['barang.toko'])->where('user_id', auth()->user()->id)->get()
        ]);
    }

    function tambah(Request $request, Barang $barang) {
        $validated = $request->validate([
            'jumlah' => 'required|integer|gt:0',
            'catatan' => 'sometimes'
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['barang_id'] = $barang->id;
        $validated['total'] = $validated['jumlah'] * $barang->harga;

        Keranjang::create($validated);

        return redirect('/keranjang')->with('notify', 'Barang Dimasukan Keranjang.');
    }

    function beli(Request $request) {
        $keranjangs = Keranjang::find($request->input('k'));

        if($keranjangs == null) {
            return redirect('/keranjang')->with('notify', 'Tidak Boleh Kosong.');
        }

        return view('beranda.co', [
            'title' => 'Check Out',
            'keranjangs' => $keranjangs
        ]);
    }

    function hapus_semua() {
        Keranjang::where('user_id', auth()->user()->id)->delete();

        return redirect('/keranjang')->with('notify', 'Hapus Semua Keranjang.');
    }

    function hapus($id) {
        Keranjang::where('id', $id)->delete();

        return redirect('/keranjang')->with('notify', 'Hapus Keranjang.');
    }

    function proses(Request $request) {
        $validated = $request->validate([
            'k.*' => 'required',
            'metode' => 'required'
        ]);

        $keranjangs = Keranjang::with('barang')->whereIn('id', $validated['k'])->get();

        foreach($validated['k'] as $key => $k) {
            PesananBaru::create([
                'user_id' => auth()->user()->id,
                'barang_id' => $keranjangs[$key]->barang->id,
                'jumlah' => $keranjangs[$key]->jumlah,
                'total' => $keranjangs[$key]->total,
                'catatan' => $keranjangs[$key]->catatan,
                'metode' => $validated['metode']
            ]);
        }

        foreach ($keranjangs as $keranjang) {
            $keranjang->delete();
        }

        return redirect('/keranjang/barcode')->with('notify', 'Silahkan Ambil Pesanan Anda.');
    }

    function barcode() {
        return view('beranda.barcode', ['title' => 'Barcode Pemesanan']);
    }

    function pesanan() {
        return view('beranda.pemesanan', [
            'title' => 'Pemesanan Anda',
            'pemesanans' => PesananBaru::with('barang')->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
