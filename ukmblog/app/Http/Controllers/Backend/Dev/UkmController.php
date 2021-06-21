<?php

namespace App\Http\Controllers\Backend\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
use App\Models\User;
use App\Models\Frontend\UkmPendaftar;
use App\Models\Backend\Ukm;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class UkmController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function semuaUkm() {
        abort_if(Gate::denies('ukm_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.ukm.semua_ukm');
    }

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
        $ukm_pendaftar = UkmPendaftar::find($id);

        $ukm = new Ukm();
        $ukm->ukm_name = $ukm_pendaftar->ukm_name;
        $ukm->description = $ukm_pendaftar->description;
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
        $id = $_POST['deleteId'];
        $delete = UkmPendaftar::find($id)->delete();

        $notif = array(
            'message' => 'Pembukaan UKM berhasil ditolak',
            'alert-type' => 'error',
        );

        return Redirect()->route('ukm.pendaftar')->with($notif);
    }
}
