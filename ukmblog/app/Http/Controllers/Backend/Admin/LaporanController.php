<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LaporanController extends Controller
{
    public function laporan() {
        abort_if(Gate::denies('laporan_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.laporan.index');
    }
}
