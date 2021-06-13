<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\MainDevController;

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

Route::group(['prefix' => 'dev', 'middleware' => ['dev:dev']], function() {
    Route::get('/login', [DevController::class, 'loginForm']);
    Route::post('/login', [DevController::class, 'store'])->name('dev.login');
});

Route::middleware(['auth:sanctum,dev', 'verified'])->get('/dev/dashboard', function () {
    return view('dev.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');


//*=============== USER ===============*//
// logout
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');


//*=============== DEV ===============*//
// logout
Route::get('/dev/logout', [DevController::class, 'destroy'])->name('dev.logout');
