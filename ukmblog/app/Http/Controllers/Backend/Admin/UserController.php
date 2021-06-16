<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function anggota() {
        return view('backend.user.anggota');
    }

    public function pendaftar() {
        return view('backend.user.pendaftar');
    }
}
