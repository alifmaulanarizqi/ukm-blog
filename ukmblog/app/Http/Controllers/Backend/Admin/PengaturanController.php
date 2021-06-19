<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PengaturanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function livetv() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.pengaturan.livetv');
    }

    public function sosialMedia() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.pengaturan.sosial');
    }

    public function bukaPendaftaran() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.pengaturan.buka_pendaftaran');
    }
}
