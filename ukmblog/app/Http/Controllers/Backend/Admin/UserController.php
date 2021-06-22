<?php

namespace App\Http\Controllers\Backend\Admin;

// use App\Models\Role;
use App\Models\User;
use App\Models\Frontend\UserPendaftar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //============= ANGGOTA =============//
    public function anggota() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        return view('backend.user.anggota');
    }


    //============= PENDAFTAR =============//
    public function pendaftar() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_pendaftars = UserPendaftar::where('ukm_id', Auth::user()->ukm_id)->get();
        return view('backend.user.pendaftar', compact('user_pendaftars'));
    }

    public function showUserPendaftar($id) {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_pendaftar = UserPendaftar::find($id);
        return view('backend.user.show_user_pendaftar', compact('user_pendaftar'));
    }

    public function approveUser($id) {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_pendaftar = UserPendaftar::find($id);

        $user = new User();
        $user->name = $user_pendaftar->name;
        $user->email = $user_pendaftar->email;
        $user->password = $user_pendaftar->password;
        $user->ukm_id = $user_pendaftar->ukm_id;
        $user->save();

        $data = array();
        $data['role_id'] = 4;
        $data['user_id'] = $user->id;
        DB::table('role_user')->insert($data);

        $delete = UserPendaftar::find($id)->delete();

        $notif = array(
            'message' => 'Pendaftar berhasil disetujui',
            'alert-type' => 'success',
        );

        return Redirect()->route('pendaftar.ukm')->with($notif);
    }

    public function declineUser() {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id = $_POST['deleteId'];
        $delete = UserPendaftar::find($id)->delete();

        $notif = array(
            'message' => 'Pendaftar UKM berhasil ditolak',
            'alert-type' => 'error',
        );

        return Redirect()->route('pendaftar.ukm')->with($notif);
    }

}
