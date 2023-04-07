<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Storage;

class BarangController extends Controller
{
    function index() {
        if(!auth()->user()->toko) {
            return redirect('/dashboard/profile')->with('notify', 'Buat Toko Terlebih Dahulu.');
        }
        return view('dashboard.barang', [
            'title' => 'Home | Penjual',
            'barangs' => Barang::where('toko_id', auth()->user()->toko->id)->get()
        ]);
    }

    function store(Request $request) {
        $validated = $request->validate([
            'foto' => 'required|image|max:1024|mimes:jpeg,png,jpg',
            'nama_barang' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        $validated['toko_id'] = auth()->user()->toko->id;
        $validated['foto'] = $request->file('foto')->store('foto-barang');

        Barang::create($validated);

        return redirect('/barang')->with('notify', 'Berhasil Menambah Barang.');
    }

    function destroy(Barang $barang) {
        Storage::delete($barang->foto);
        $barang->delete();
        return redirect('/barang')->with('notify', 'Berhasil Menghapus Barang.');
    }
}
