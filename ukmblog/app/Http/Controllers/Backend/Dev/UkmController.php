<?php

namespace App\Http\Controllers\Backend\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function semuaUkm() {
        return view('backend.ukm.semua_ukm');
    }

    public function ukmPendaftar() {
        return view('backend.ukm.ukm_pendaftar');
    }
}
