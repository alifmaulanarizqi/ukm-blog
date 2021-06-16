<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('backend.kategori.index');
    }
}
