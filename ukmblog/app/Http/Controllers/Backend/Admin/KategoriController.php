<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class KategoriController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.kategori.index');
    }
}
