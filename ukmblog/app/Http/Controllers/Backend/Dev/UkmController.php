<?php

namespace App\Http\Controllers\Backend\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UkmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function semuaUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.ukm.semua_ukm');
    }

    public function ukmPendaftar() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.ukm.ukm_pendaftar');
    }
}
