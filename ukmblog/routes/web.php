<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\Frontend\UkmPendaftarController;
use App\Http\Controllers\Frontend\UserPendaftarController;
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
    if(Auth::user()->ukm_id == NULL)
      return view('backend.indexdev');
    else
      return view('backend.indexuser');
})->name('dashboard');

// user setting
Route::get('/user/profile', [UserSettingController::class, 'userProfile'])->name('profile.setting');
Route::post('/user/profile/update', [UserSettingController::class, 'updateUserProfile'])->name('update.profile');
Route::get('/user/password', [UserSettingController::class, 'userChangePassword'])->name('change.password');
Route::post('/user/password/update', [UserSettingController::class, 'updateUserPassword'])->name('update.password');


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
Route::get('/kategori/add', [KategoriController::class, 'addKategori'])->name('add.kategori');
Route::post('/kategori/store', [KategoriController::class, 'storeKategori'])->name('store.kategori');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'editKategori'])->name('edit.kategori');
Route::post('/kategori/update/{id}', [KategoriController::class, 'updateKategori'])->name('update.kategori');
Route::post('/kategori/softdelete', [KategoriController::class, 'softDeleteKategori'])->name('softdelete.kategori');
Route::get('/kategori/restore/{id}', [KategoriController::class, 'restoreKategori'])->name('restore.kategori');
Route::post('/kategori/delete', [KategoriController::class, 'deleteKategori'])->name('delete.kategori');

// post
Route::get('/post/all', [PostController::class, 'index'])->name('post');
Route::get('/post/add', [PostController::class, 'addPost'])->name('add.post');
Route::post('/post/store', [PostController::class, 'storePost'])->name('store.post');
Route::get('/post/edit/{id}', [PostController::class, 'editPost'])->name('edit.post');
Route::post('/post/update/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::post('/post/softdelete', [PostController::class, 'softDeletePost'])->name('softdelete.post');
Route::get('/post/restore/{id}', [PostController::class, 'restorePost'])->name('restore.post');
Route::post('/post/delete', [PostController::class, 'deletePost'])->name('delete.post');

// user pendaftar
Route::get('/anggota/all', [UserController::class, 'anggota'])->name('anggota.ukm');
Route::get('/anggota/pendaftar', [UserController::class, 'pendaftar'])->name('pendaftar.ukm');
Route::get('/anggota/pendaftar/{id}', [UserController::class, 'showUserPendaftar'])->name('show.userpendaftar');
Route::get('/anggota/approve/{id}', [UserController::class, 'approveUser'])->name('aprrove.user');
Route::post('/anggota/decline', [UserController::class, 'declineUser'])->name('decline.user');

// user anggota
Route::get('/anggota/edit/{id}', [UserController::class, 'editAnggota'])->name('edit.anggota');
Route::post('/update/anggota/{id}', [UserController::class, 'updateAnggota'])->name('update.anggota');
Route::post('/anggota/softdelete', [UserController::class, 'softDeleteAnggota'])->name('softdelete.anggota');
Route::get('/anggota/restore/{id}', [UserController::class, 'restoreAnggota'])->name('restore.anggota');
Route::post('/anggota/delete', [UserController::class, 'deleteAnggota'])->name('delete.anggota');


// laporan
Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');


// profile ukm
Route::get('/pengaturan/profileukm', [PengaturanController::class, 'profileUkm'])->name('pengaturan.profileukm');
Route::post('/pengaturan/update/profileukm/{id}', [PengaturanController::class, 'updateProfileUkm'])->name('update.profileukm');

// live tv
Route::get('/pengaturan/livetv', [PengaturanController::class, 'livetv'])->name('pengaturan.livetv');
Route::post('/pengaturan/update/livetv/{id}', [PengaturanController::class, 'updateLiveTv'])->name('update.livetv');

// sosial media
Route::get('/pengaturan/sosial-media', [PengaturanController::class, 'sosialMedia'])->name('pengaturan.sosial');
Route::post('/pengaturan/update/sosial/{id}', [PengaturanController::class, 'updateSosialMedia'])->name('update.sosial');

// buka-pendaftaran
Route::get('/pengaturan/buka-pendaftaran', [PengaturanController::class, 'bukaPendaftaran'])->name('pengaturan.bukapendaftaran');
Route::get('/pengaturan/pendaftaran/active/{id}', [PengaturanController::class, 'activeOpenRegistration'])->name('active.open_registration');
Route::get('/pengaturan/pendaftaran/deactive/{id}', [PengaturanController::class, 'deActiveOpenRegistration'])->name('deactive.open_registration');



//*=============== FRONTEND ===============*//
Route::get('/nama-ukm', [ExtraController::class, 'halamanUkm'])->name('hal.ukm');
Route::get('/daftar-ukm', [ExtraController::class, 'daftarUkm'])->name('daftar.ukm');
Route::get('/buka-ukm', [ExtraController::class, 'bukaUkm'])->name('buka.ukm');

// pendaftaran ukm
Route::post('/pendaftaran-ukm', [UkmPendaftarController::class, 'pendaftaranUkm'])->name('pendaftaran.ukm');

// pendaftaran user
Route::post('/daftar-ukm', [UserPendaftarController::class, 'pendaftaranUser'])->name('pendaftaran.user');
