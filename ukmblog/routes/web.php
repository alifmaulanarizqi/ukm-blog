<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dev\UkmController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Frontend\UkmPendaftarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function() {
    return view('user.index');
})->name('dashboard');


//*=============== FRONTEND ===============*//
Route::get('/ukm/nama-ukm', [ExtraController::class, 'halamanUkm'])->name('hal.ukm');
Route::get('/daftar-ukm', [ExtraController::class, 'daftarUkm'])->name('daftar.ukm');
Route::get('/buka-ukm', [ExtraController::class, 'bukaUkm'])->name('buka.ukm');

// pendaftaran ukm
Route::post('/pendaftaran-ukm', [UkmPendaftarController::class, 'pendaftaranUkm'])->name('pendaftaran.ukm');



//*=============== USER ===============*//
// logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
