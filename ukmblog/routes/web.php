<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Frontend\UkmPendaftarController;
use App\Http\Controllers\Backend\Dev\UkmController;
use App\Http\Controllers\Backend\Admin\KategoriController;
use App\Http\Controllers\Backend\Admin\PostController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\LaporanController;
use App\Http\Controllers\Backend\Admin\PengaturanController;

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
    return view('backend.index');
})->name('dashboard');



//*=============== BACKEND UNTUK DEVELOPER ===============*//
// ukm pendaftar
Route::get('/ukm/pendaftar', [UkmController::class, 'ukmPendaftar'])->name('ukm.pendaftar');
Route::get('/ukm/pendaftar/{id}', [UkmController::class, 'showUkmPendaftar'])->name('show.ukmpendaftar');
Route::get('/ukm/approve/{id}', [UkmController::class, 'approveUkm'])->name('aprrove.ukm');
Route::post('/ukm/decline', [UkmController::class, 'declineUkm'])->name('decline.ukm');

// semua ukm
Route::get('/ukm/all', [UkmController::class, 'semuaUkm'])->name('ukm.semua');
Route::get('/ukm/{id}', [UkmController::class, 'showUkm'])->name('show.ukm');
Route::post('/ukm/softdelete', [UkmController::class, 'softDeleteUkm'])->name('softdelete.ukm');
Route::get('/ukm/restore/{id}', [UkmController::class, 'restoreUkm'])->name('restore.ukm');
Route::post('/ukm/delete', [UkmController::class, 'deleteUkm'])->name('delete.ukm');




//*=============== BACKEND UNTUK KETUA DAN ADMIN ===============*//
// kategori
Route::get('/kategori/all', [KategoriController::class, 'index'])->name('kategori');

// post
Route::get('/post/all', [PostController::class, 'index'])->name('post');

// user
Route::get('/anggota/all', [UserController::class, 'anggota'])->name('anggota.ukm');
Route::get('/anggota/pendaftar', [UserController::class, 'pendaftar'])->name('pendaftar.ukm');

// laporan
Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');

// pengaturan
Route::get('/pengaturan/livetv', [PengaturanController::class, 'livetv'])->name('pengaturan.livetv');
Route::get('/pengaturan/sosial-media', [PengaturanController::class, 'sosialMedia'])->name('pengaturan.sosial');
Route::get('/pengaturan/buka-pendaftaran', [PengaturanController::class, 'bukaPendaftaran'])->name('pengaturan.bukapendaftaran');



//*=============== FRONTEND ===============*//
Route::get('/ukm/nama-ukm', [ExtraController::class, 'halamanUkm'])->name('hal.ukm');
Route::get('/daftar-ukm', [ExtraController::class, 'daftarUkm'])->name('daftar.ukm');
Route::get('/buka-ukm', [ExtraController::class, 'bukaUkm'])->name('buka.ukm');

// pendaftaran ukm
Route::post('/pendaftaran-ukm', [UkmPendaftarController::class, 'pendaftaranUkm'])->name('pendaftaran.ukm');
