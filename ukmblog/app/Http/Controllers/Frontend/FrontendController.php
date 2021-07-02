<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Ukm;
use App\Models\Backend\Post;
use App\Models\Backend\Kategori;
use Illuminate\Database\Eloquent\Builder;

class FrontendController extends Controller
{
    public function halamanUtama() {
        $banner = Post::select('id', 'title', 'image', 'konten')->where('headline_utama', 1)->get();
        $ukm_section = Ukm::select('id', 'ukm_name', 'image', 'slug')->get();
        $post_section = Post::latest()->limit(8)->get();
        return view('main.index', compact('banner', 'ukm_section', 'post_section'));
    }

    public function halamanUkm($slug) {
        $ukm = Ukm::where('slug', $slug)->first();
        $banner = Post::whereHas('ukm', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('headline_ukm', 1)->get();
        $post_terbaru = Post::whereHas('ukm', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->latest()->limit(9)->get();
        $kategori = Kategori::whereHas('ukm', function($query) use ($slug) {
          $query->where('slug', $slug);
        })->get();
        return view('main.ukm', compact('banner', 'ukm', 'post_terbaru', 'kategori'));
    }

    public function daftarUkm() {
        $open_register_ukms = Ukm::where('open_registration', 1)->get();
        return view('main.daftar_ukm', compact('open_register_ukms'));
    }

    public function bukaUkm() {
        return view('main.buka_ukm');
    }
}
