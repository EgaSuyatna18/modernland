<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Barang;
use Storage;

class TokoController extends Controller
{
    function updateFoto(Request $request) {
        $request->validate([
            'foto' => 'required|image|max:1024|mimes:jpeg,png,jpg'
        ]);

        $toko = Toko::where('user_id', auth()->user()->id)->first();

        if(!$toko) {
            return redirect('/dashboard/profile')->with('notify', 'Isi Data Terlebih Dahulu.');
        }

        if(isset($toko->foto) && $toko->foto != '/assets/img/toko-default.png') {
            Storage::delete($toko->foto);
        }

        $data['foto'] = $request->file('foto')->store('foto-toko');

        $toko->update($data);

        return redirect('/dashboard/profile')->with('notify', 'Berhasil Mengubah Foto.');
    }

    function update(Request $request) {
        $validated = $request->validate([
            'nama_toko' => 'required',
            'nama_pemilik' => 'required',
            'no_telepon' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required'
        ]);

        $toko = Toko::where('user_id', auth()->user()->id)->first();

        if(!$toko) {
            $validated['user_id'] = auth()->user()->id;
            Toko::create($validated);
            return redirect('/dashboard/profile')->with('notify', 'Berhasil Membuat Toko.');
        }

        $toko->update($validated);

        return redirect('/dashboard/profile')->with('notify', 'Berhasil Mengubah Toko.');
    }

    function toko(Request $reqeust) {
        return view('beranda.toko', [
            'title' => 'Toko',
            'tokos' => Toko::paginate(6),
            'kategoris' => Toko::groupBy('kategori')->limit(20)->get()
        ]);
    }

    function tokoDetail(Toko $toko) {
        return view('beranda.tokoDetail', [
            'title' => 'Detail Toko',
            'toko' => $toko,
            'barangs' => Barang::where('toko_id', $toko->id)->paginate(6)
        ]);
    }

    function tokoCari(Request $request) {
        return view('beranda.toko', [
            'title' => 'Toko',
            'tokos' => Toko::where('nama_toko', 'LIKE', '%'. $request->input('key') .'%')->paginate(6),
            'kategoris' => Toko::groupBy('kategori')->limit(20)->get()
        ]);
    }
}
