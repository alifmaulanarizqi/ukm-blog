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
use Auth;
use Image;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $posts = Post::where('ukm_id', Auth::user()->ukm_id)->get();
        $posts_in_trash = Post::onlyTrashed()->where('ukm_id', Auth::user()->ukm_id)->get();
        return view('backend.post.index', compact('posts', 'posts_in_trash'));
    }

    public function addPost() {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $kategoris = Kategori::where('ukm_id', Auth::user()->ukm_id)->get();
        return view('backend.post.add', compact('kategoris'));
    }

    public function storePost(Request $request) {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,png',
            'kategori_id' =>'required',
        ]);

        $post = new Post;
        $post->kategori_id = $request->kategori_id;
        $post->ukm_id = Auth::user()->ukm_id;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->konten = $request->konten;
        $post->headline_utama = $request->headline_utama;
        $post->headline_ukm = $request->headline_ukm;
        $post->tanggal = date('d M Y');

        $postImage = $request->file('image');

        if($postImage) {
            $newName = hexdec(uniqid()).'.'.$postImage->getClientOriginalExtension();

            Image::make($postImage)->
            fit(500, 300)->save('image/posts/'.$newName);

            $locAndImgName = 'image/posts/'.$newName;
            $post->image = $locAndImgName;
        }

        $post->save();

        $notif = array(
            'message' => 'Post berhasil ditambah',
            'alert-type' => 'success',
        );

        return Redirect()->route('post')->with($notif);
    }

    public function editPost($id) {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $post = Post::find($id);
        $kategoris = Kategori::where('ukm_id', Auth::user()->ukm_id)->get();
        return view('backend.post.edit',compact('post', 'kategoris'));
    }

    public function updatePost(Request $request, $id) {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,png',
            'kategori_id' =>'required',
        ]);

        $update = Post::find($id)->update([
            'kategori_id' => $request->kategori_id,
            'title' => $request->title,
            'konten' => $request->konten,
            'headline_utama' => $request->headline_utama,
            'headline_ukm' => $request->headline_ukm,
            'tanggal' => date('d M Y'),
        ]);

        $oldImage = $request->old_image;

        if ($_FILES['image']['size'] != 0) {
            $postImage = $request->file('image');
            $newName = hexdec(uniqid()).'.'.$postImage->getClientOriginalExtension();

            Image::make($postImage)->
            fit(500, 300)->save('image/posts/'.$newName);

            $locAndImgName = 'image/posts/'.$newName;

            if($oldImage != NULL)
                unlink($oldImage);

            $update = Post::find($id)->update([
                'image' => $locAndImgName,
            ]);
        }

        $notif = array(
            'message' => 'Post berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('post')->with($notif);
    }

    public function softDeletePost() {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $delete = Post::find($id)->delete();

        $notif = array(
            'message' => 'Post berhasil dimasukan ke keranjang sampah',
            'alert-type' => 'warning',
        );

        return Redirect()->route('post')->with($notif);
    }

    public function restorePost($id) {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $restore = Post::onlyTrashed()->find($id)->restore();

        $notif = array(
            'message' => 'Post berhasil direstore',
            'alert-type' => 'success',
        );

        return Redirect()->route('post')->with($notif);
    }

    public function deletePost() {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $post = Post::onlyTrashed()->find($id);

        if($post->image != NULL)
            unlink($post->image);

        $delete = $post->forceDelete();

        $notif = array(
            'message' => 'Post berhasil dihapus',
            'alert-type' => 'error',
        );

        return Redirect()->route('post')->with($notif);
    }
}
