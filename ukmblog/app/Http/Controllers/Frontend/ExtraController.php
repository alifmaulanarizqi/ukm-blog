<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function halamanUkm() {
        return view('main.ukm');
    }

    public function daftarUkm() {
        return view('main.daftar_ukm');
    }

    public function bukaUkm() {
        return view('main.buka_ukm');
    }
}
