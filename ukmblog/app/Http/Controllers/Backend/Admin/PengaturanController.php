<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use App\Models\Backend\Ukm;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Image;

class PengaturanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //============= PROFILE UKM =============//
    public function profileUkm() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $profile_ukm = Ukm::find(Auth::user()->ukm_id);
        return view('backend.pengaturan.profile_ukm', compact('profile_ukm'));
    }

    public function updateProfileUkm(Request $request, $id) {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $validated = $request->validate([
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $update = Ukm::find($id)->update([
            'description' => $request->description,
        ]);

        $old_image = $request->old_image;

        if($_FILES['image']['size'] != 0) {
            $ukm_image = $request->file('image');
            $newName = hexdec(uniqid()).'.'.$ukm_image->getClientOriginalExtension();

            Image::make($ukm_image)->save('image/ukms/'.$newName);

            $locAndImgName = 'image/ukms/'.$newName;

            if($old_image != NULL)
                unlink($old_image);

            $update = Ukm::find($id)->update([
                'image' => $locAndImgName,
            ]);
        }

        $notif = array(
            'message' => 'Profile ukm berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('pengaturan.profileukm')->with($notif);
    }


    //============= LIVE TV =============//
    public function livetv() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $livetv = Ukm::find(Auth::user()->ukm_id);
        return view('backend.pengaturan.livetv', compact('livetv'));
    }

    public function updateLiveTv(Request $request, $id) {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $update = Ukm::find($id)->update([
            'livetv' => $request->livetv,
        ]);

        $notif = array(
            'message' => 'Live TV berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('pengaturan.livetv')->with($notif);
    }


    //============= SOSIAL MEDIA =============//
    public function sosialMedia() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $sosial_media = Ukm::find(Auth::user()->ukm_id);
        return view('backend.pengaturan.sosial', compact('sosial_media'));
    }

    public function updateSosialMedia(Request $request, $id) {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, 'Anda Tidak Punya Akses Ke Halaman Ini');

        $update = Ukm::find($id)->update([
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
        ]);

        $notif = array(
            'message' => 'Sosial media berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('pengaturan.sosial')->with($notif);
    }


    //============= BUKA PENDAFTARAN =============//
    public function bukaPendaftaran() {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $open_registration = Ukm::find(Auth::user()->ukm_id);
        return view('backend.pengaturan.buka_pendaftaran', compact('open_registration'));
    }

    public function activeOpenRegistration(Request $request, $id) {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $update = Ukm::find($id)->update([
            'open_registration' => 1,
        ]);

        $notif = array(
            'message' => 'Pendaftaran anggota berhasil dibuka',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notif);
    }

    public function deActiveOpenRegistration(Request $request, $id) {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $update = Ukm::find($id)->update([
            'open_registration' => 0,
        ]);

        $notif = array(
            'message' => 'Pendaftaran anggota berhasil ditutup',
            'alert-type' => 'warning',
        );

        return Redirect()->back()->with($notif);
    }
}
