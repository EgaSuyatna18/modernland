<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
