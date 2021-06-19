<?php

namespace App\Http\Controllers\Backend\Admin;

// use App\Models\Role;
// use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function anggota() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.user.anggota');
    }

    public function pendaftar() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user.pendaftar');
    }
}
