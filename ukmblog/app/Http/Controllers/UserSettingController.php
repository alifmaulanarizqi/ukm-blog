<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Image;

class UserSettingController extends Controller
{
    public function userProfile() {
        $user = User::find(Auth::id());
        return view('backend.usersetting.profile', compact('user'));
    }

    public function updateUserProfile(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'profile_photo_path' => 'mimes:jpg,jpeg,png',
        ]);

        $id = Auth::id();
        $update = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $old_image = $request->old_image;

        if($_FILES['profile_photo_path']['size'] != 0) {
            $profile_image = $request->file('profile_photo_path');
            $newName = hexdec(uniqid()).'.'.$profile_image->getClientOriginalExtension();

            Image::make($profile_image)->save('image/users/'.$newName);

            $locAndImgName = 'image/users/'.$newName;

            if($old_image != NULL)
                unlink($old_image);

            $update = User::find($id)->update([
                'profile_photo_path' => $locAndImgName,
            ]);
        }

        $notif = array(
            'message' => 'User profile berhasil diupdate',
            'alert-type' => 'info',
        );

        return Redirect()->route('profile.setting')->with($notif);
    }

    public function userChangePassword() {
        return view('backend.usersetting.change_password');
    }

    public function updateUserPassword(Request $request) {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $old_password = Auth::user()->password;

        if(Hash::check($request->oldpassword, $old_password)) {
            $update = User::find(Auth::id())->update([
                'password' => Hash::make($request->password),
            ]);

            Auth::logout();

            $notif = array(
                'message' => 'Password berhasil diupdate',
                'alert-type' => 'info',
            );

            return Redirect()->route('login')->with($notif);
        }

        $notif = array(
            'message' => 'Current password is invalid',
            'alert-type' => 'error',
        );

        return Redirect()->back()->with($notif);
    }
}
