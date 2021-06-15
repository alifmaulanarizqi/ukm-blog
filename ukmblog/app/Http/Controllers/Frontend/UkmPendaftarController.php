<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Frontend\UkmPendaftar;

class UkmPendaftarController extends Controller
{
    public function pendaftaranUkm(Request $request) {
        $validated = $request->validate([
            'ukm_name' => 'required|unique:ukms|max:255',
            'description' => 'required',
            'leader' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $ukm_pendaftar = new UkmPendaftar();
        $ukm_pendaftar->ukm_name = $request->ukm_name;
        $ukm_pendaftar->description = $request->description;
        $ukm_pendaftar->leader = $request->leader;
        $ukm_pendaftar->email = $request->email;
        $ukm_pendaftar->password = Hash::make($request->password);
        $ukm_pendaftar->save();

        $notif = array(
            'message' => 'Data UKM berhasil dikirim, tinggal tunggu persetujuan',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notif);
    }
}
