<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use App\Models\Backend\Post;
use App\Models\Backend\Kategori;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Auth;

class LaporanController extends Controller
{
    public function laporan() {
        abort_if(Gate::denies('laporan_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $data = Post::select('kategori_id', DB::raw('count("id") as count'))
                      ->where('ukm_id', Auth::user()->ukm_id)
                      ->groupBy('kategori_id')
                      ->get();

        foreach($data as $row) {
            $kategori[] = $row->kategori->kategori;
            $jumlah_post[] = $row->count;
        }

        return view('backend.laporan.index', compact('kategori', 'jumlah_post'));
    }
}
