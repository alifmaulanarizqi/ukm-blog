<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Ukm;

class ExtraController extends Controller
{
    public function halamanUkm() {
        return view('main.ukm');
    }

    public function daftarUkm() {
        $open_register_ukms = Ukm::where('open_registration', 1)->get();
        return view('main.daftar_ukm', compact('open_register_ukms'));
    }

    public function bukaUkm() {
        return view('main.buka_ukm');
    }
}
