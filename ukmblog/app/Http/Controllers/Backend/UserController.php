<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function logout() {
        Auth::logout();
        return Redirect()->route('login');
    }
}
