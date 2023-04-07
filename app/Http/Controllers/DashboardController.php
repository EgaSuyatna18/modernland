<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;

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

        return view('dashboard.index', [
            'title' => 'Dashboard Toko',
            'toko' => $toko
        ]);
    }

    function profile() {
        return view('dashboard.profile', [
            'title' => 'Profile',
            'toko' => Toko::with('user')->where('user_id', auth()->user()->id)->first()
        ]);
    }
}
