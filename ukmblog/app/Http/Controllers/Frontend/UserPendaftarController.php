<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Frontend\UserPendaftar;

class UserPendaftarController extends Controller
{
    public function pendaftaranUser(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'ukm_id' => 'required',
        ]);

        $user_pendaftar = new UserPendaftar();
        $user_pendaftar->name = $request->name;
        $user_pendaftar->email = $request->email;
        $user_pendaftar->password = Hash::make($request->password);
        $user_pendaftar->ukm_id = $request->ukm_id;
        $user_pendaftar->reason_joining = $request->reason_joining;
        $user_pendaftar->save();

        $notif = array(
            'message' => 'Data Pendaftar berhasil dikirim, tinggal tunggu persetujuan',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notif);
    }
}
