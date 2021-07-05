<?php

namespace App\Http\Controllers\Backend\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
use App\Models\User;
use App\Models\Frontend\UkmPendaftar;
use App\Models\Backend\Ukm;
use App\Models\Backend\Post;
use App\Models\Backend\Kategori;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UkmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    //============= UKM PENDAFTAR =============//
    public function ukmPendaftar() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukm_pendaftars = UkmPendaftar::latest()->get();
        return view('backend.ukm.ukm_pendaftar', compact('ukm_pendaftars'));
    }

    public function showUkmPendaftar($id) {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukm_pendaftar = UkmPendaftar::find($id);
        return view('backend.ukm.show', compact('ukm_pendaftar'));
    }

    public function approveUkm($id) {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukm_pendaftar = UkmPendaftar::find($id);
        $slug = SlugService::createSlug(Ukm::class, 'slug', $ukm_pendaftar->ukm_name);

        $ukm = new Ukm();
        $ukm->ukm_name = $ukm_pendaftar->ukm_name;
        $ukm->description = $ukm_pendaftar->description;
        $ukm->slug = $slug;
        $ukm->save();

        $user = new User();
        $user->name = $ukm_pendaftar->leader;
        $user->email = $ukm_pendaftar->email;
        $user->password = $ukm_pendaftar->password;
        $user->ukm_id = $ukm->id;
        $user->save();

        $data = array();
        $data['role_id'] = 2;
        $data['user_id'] = $user->id;
        DB::table('role_user')->insert($data);

        $delete = UkmPendaftar::find($id)->delete();

        $notif = array(
            'message' => 'Pembukaan UKM berhasil disetujui',
            'alert-type' => 'success',
        );

        return Redirect()->route('ukm.pendaftar')->with($notif);
    }

    public function declineUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $delete = UkmPendaftar::find($id)->delete();

        $notif = array(
            'message' => 'Pembukaan UKM berhasil ditolak',
            'alert-type' => 'error',
        );

        return Redirect()->route('ukm.pendaftar')->with($notif);
    }


    //============= SEMUA UKM =============//
    public function semuaUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukms = Ukm::latest()->get();
        $ukms_in_trash = Ukm::onlyTrashed()->latest()->get();
        return view('backend.ukm.semua_ukm', compact('ukms', 'ukms_in_trash'));
    }

    public function showUkm($id) {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukm = Ukm::find($id);
        return view('backend.ukm.show_ukm', compact('ukm'));
    }

    public function softDeleteUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];
        $delete_user = User::where('ukm_id', $id)->delete();
        $delete_kategori = Kategori::where('ukm_id', $id)->delete();
        $delete_post = Post::where('ukm_id', $id)->delete();
        $delete_ukm = Ukm::find($id)->delete();

        $notif = array(
            'message' => 'UKM berhasil dimasukan ke keranjang sampah',
            'alert-type' => 'warning',
        );

        return Redirect()->route('ukm.semua')->with($notif);
    }

    public function restoreUkm($id) {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $ukm = Ukm::withTrashed()->find($id);
        $restore_user = User::where('ukm_id', $ukm->id)->restore();
        $restore_kategori = Kategori::where('ukm_id', $ukm->id)->restore();
        $restore_post = Post::where('ukm_id', $ukm->id)->restore();
        $restore_ukm = $ukm->restore();

        $notif = array(
            'message' => 'UKM berhasil direstore',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notif);
    }

    public function deleteUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $id = $_POST['deleteId'];

        $post = Post::onlyTrashed()->where('ukm_id', $id)->first();
        if($post->image != NULL)
            unlink($post->image);
        $delete_post = $post->forceDelete();

        $delete_kategori = Kategori::onlyTrashed()->where('ukm_id', $id)->forceDelete();

        $user = User::onlyTrashed()->where('ukm_id', $id)->first();
        if($user->profile_photo_path != NULL)
            unlink($user->profile_photo_path);
        $delete_user = $user->forceDelete();

        $ukm = Ukm::onlyTrashed()->find($id);
        if($ukm->image != NULL)
            unlink($ukm->image);
        $delete_ukm = $ukm->forceDelete();

        $notif = array(
            'message' => 'UKM berhasil dihapus',
            'alert-type' => 'error',
        );

        return Redirect()->back()->with($notif);
    }

}
