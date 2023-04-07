<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Barang;

class PageController extends Controller
{
    function index() {
        return view('index', ['title' => 'Login']);
    }

    function loginPembeli() {
        return view('auth.login', [
            'title' => 'Login Pembeli',
            'login' => 'Pembeli'
        ]);
    }

    function loginPenjual() {
        return view('auth.login', [
            'title' => 'Login Penjual',
            'login' => 'Penjual'
        ]);
    }

    function registerPenjual() {
        return view('auth.register', [
            'title' => 'Register Penjual',
            'login' => 'Penjual'
        ]);
    }

    function registerPembeli() {
        return view('auth.register', [
            'title' => 'Register Pembeli',
            'login' => 'Pembeli'
        ]);
    }

    function beranda() {
        return view('beranda.index', [
            'title' => 'Beranda',
            'tokos' => Toko::inRandomOrder()->limit(10)->get(),
            'barangs' => Barang::with('toko')->inRandomOrder()->limit(10)->get()
        ]);
    }

    function faq() {
        return view('beranda.faq', [
            'title' => 'FAQ'
        ]);
    }

    function panduan() {
        return view('beranda.panduan', [
            'title' => 'Panduan Belanja'
        ]);
    }
}
