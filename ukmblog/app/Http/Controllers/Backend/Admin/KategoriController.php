<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use App\Models\Backend\Kategori;
use App\Models\Backend\Post;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;

class KategoriController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $kategoris = Kategori::where('ukm_id', Auth::user()->ukm_id)->latest()->get();
        $kategoris_in_trash = Kategori::onlyTrashed()->where('ukm_id', Auth::user()->ukm_id)->get();
        return view('backend.kategori.index', compact('kategoris', 'kategoris_in_trash'));
    }

    public function addKategori() {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.kategori.add');
    }

    public function storeKategori(Request $request) {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $validated = $request->validate([
            'kategori' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:kategoris',
        ]);

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->slug = $request->slug;
        $kategori->ukm_id = Auth::user()->ukm_id;
        $kategori->save();

        $notif = array(
            'message' => 'Kategori berhasil ditambah',
            'alert-type' => 'success',
        );

        return Redirect()->route('kategori')->with($notif);
    }

    public function editKategori($id) {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $kategori = Kategori::find($id);
        return view('backend.kategori.edit', compact('kategori'));
    }

    public function updateKategori(Request $request, $id) {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $validated = $request->validate([
            'kategori' => 'required|max:255',
            'slug' => 'required|alpha_dash|unique:kategoris',
        ]);

        $update = Kategori::find($id)->update([
          'kategori' => $request->kategori,
          'slug' => $request->slug,
        ]);

        $notif = array(
            'message' => 'Kategori berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('kategori')->with($notif);
    }

    public function softDeleteKategori() {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $delete_post = Post::where('kategori_id', $id)->delete();
        $delete_kategori = Kategori::find($id)->delete();

        $notif = array(
            'message' => 'Kategori berhasil dimasukan ke keranjang sampah',
            'alert-type' => 'warning',
        );

        return Redirect()->route('kategori')->with($notif);
    }

    public function restoreKategori($id) {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $restore_post = Post::onlyTrashed()->where('kategori_id', $id)->restore();
        $restore_kategori = Kategori::onlyTrashed()->find($id)->restore();

        $notif = array(
            'message' => 'Kategori berhasil direstore',
            'alert-type' => 'info',
        );

        return Redirect()->route('kategori')->with($notif);
    }

    public function deleteKategori() {
        abort_if(Gate::denies('kategori_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $post = Post::onlyTrashed()->where('kategori_id', $id)->first();
        if($post->image != NULL)
            unlink($post->image);
        $delete_post = $post->forceDelete();
        $delete_kategori = Kategori::onlyTrashed()->find($id)->forceDelete();

        $notif = array(
            'message' => 'Kategori berhasil dihapus',
            'alert-type' => 'error',
        );

        return Redirect()->route('kategori')->with($notif);
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->kategori);

        return response()->json(['slug' => $slug]);
    }

}
