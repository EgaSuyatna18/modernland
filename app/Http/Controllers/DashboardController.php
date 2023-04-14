<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;
use App\Models\PesananSelesai;

class DashboardController extends Controller
{
    function index() {
        if(auth()->user()->role == 'pembeli') {
            return redirect('/beranda');
        }

        $toko = Toko::with('user')->where('user_id', auth()->user()->id)->first();

        if(!$toko) {
            return redirect('/dashboard/profile')->with('notify', 'Buat Toko Terlebih Dahulu.');
        }

        $pendapatan = PesananSelesai::whereHas('barang.toko', function($q)
        {
            $q->where('user_id','=', auth()->user()->id);
        
        })->sum('total');

        $terjual = PesananSelesai::whereHas('barang.toko', function($q)
        {
            $q->where('user_id','=', auth()->user()->id);
        
        })->sum('jumlah');

        $pembeli = PesananSelesai::whereHas('barang.toko', function($q)
        {
            $q->where('user_id','=', auth()->user()->id);
        
        })->groupBy('user_id')->get()->count();

        return view('dashboard.index', [
            'title' => 'Dashboard Toko',
            'toko' => $toko,
            'pendapatan' => $pendapatan,
            'terjual' => $terjual,
            'pembeli' => $pembeli
        ]);
    }

    function profile() {
        return view('dashboard.profile', [
            'title' => 'Profile',
            'toko' => Toko::with('user')->where('user_id', auth()->user()->id)->first()
        ]);
    }
}
