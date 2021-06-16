<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function livetv() {
        return view('backend.pengaturan.livetv');
    }

    public function sosialMedia() {
        return view('backend.pengaturan.sosial');
    }

    public function bukaPendaftaran() {
        return view('backend.pengaturan.buka_pendaftaran');
    }
}
