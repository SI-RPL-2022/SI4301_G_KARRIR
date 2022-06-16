<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// Login
Route::get('/login', [UserController::class, 'login'])->middleware('guest', 'guest:perusahaan');
Route::post('/login', [UserController::class, 'proses_login'])->middleware('guest', 'guest:perusahaan');

Route::get('/daftar', [UserController::class, 'register'])->middleware('guest:perusahaan', 'guest');
Route::post('/daftar', [UserController::class, 'proses_regis']);
Route::post('/daftar/verifikasi/{id}', [UserController::class, 'verifikasi']);

Route::get('/logout', [UserController::class, 'logout'] );


// Karrir

Route::get('/', function () {
    return view('home_karrir');
});
Route::get('/karrir/profile', [UserController::class, 'profile']);
Route::post('/karrir/profile/{id}', [UserController::class, 'proses_update']);
