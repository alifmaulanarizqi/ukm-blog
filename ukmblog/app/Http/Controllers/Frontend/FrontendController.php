<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Ukm;
use App\Models\Backend\Post;

class FrontendController extends Controller
{
    public function halamanUtama() {
        $banner = Post::select('id', 'title', 'image', 'konten')->where('headline_utama', 1)->get();
        $ukm_section = Ukm::select('id', 'ukm_name', 'image')->get();
        $post_section = Post::latest()->limit(8)->get();
        return view('main.index', compact('banner', 'ukm_section', 'post_section'));
    }
}
