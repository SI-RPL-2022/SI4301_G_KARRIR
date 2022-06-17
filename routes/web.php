<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
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

Route::middleware('verification')->group(function () {
    Route::get('/', [UserController::class, 'index']);

    // Login
    Route::get('/login', [UserController::class, 'login'])->middleware('guest', 'guest:perusahaan')->name('login');
    Route::post('/login', [UserController::class, 'proses_login'])->middleware('guest', 'guest:perusahaan');

    Route::get('/daftar', [UserController::class, 'register'])->middleware('guest:perusahaan', 'guest');
    Route::post('/daftar', [UserController::class, 'proses_regis']);

    Route::get('/lowongan', [LowonganController::class, 'index']);
    Route::get('/lowongan/detail/{id}', [LowonganController::class, 'detail_lowongan']);

    Route::post('/lowongan/lamar/{id}', [LowonganController::class, 'melamar']);




    // Karrir
    Route::middleware('auth')->group(function () {

        Route::get('/karrir/profile', [UserController::class, 'profile']);
        Route::post('/karrir/profile/{id}', [UserController::class, 'proses_update']);

        Route::get('/karrir/notifikasi', [LowonganController::class, 'notif_lamaran']);
        Route::get('/karrir/lamaran/{id}', [LowonganController::class, 'detail_lamaran']);

        Route::post('/upload/resume/{id}', [UploadController::class, 'upload_resume']);
        Route::post('/upload/organisasi/{id}', [UploadController::class, 'upload_organisasi']);
        Route::post('/upload/sertifikasi/{id}', [UploadController::class, 'upload_sertifikasi']);
        Route::post('/upload/portofolio/{id}', [UploadController::class, 'upload_portofolio']);
        
        
        
    });
    
    Route::get('/download/resume/{id}', [UploadController::class, 'download_resume']);
    Route::get('/download/organisasi/{id}', [UploadController::class, 'download_organisasi']);
    Route::get('/download/sertifikasi/{id}', [UploadController::class, 'download_sertifikasi']);
    Route::get('/download/portofolio/{id}', [UploadController::class, 'download_portofolio']);
    Route::get('/download/dokumen/{id}', [UploadController::class, 'download_dokumen']);
    
    // Provider
    Route::middleware('auth:perusahaan')->group(function () {

        Route::get('/provider/lowongan', [ProviderController::class, 'index']);
        Route::get('/provider/lowongan/create', [ProviderController::class, 'create_lowongan']);
        Route::post('/provider/lowongan/create', [ProviderController::class, 'store_lowongan']);
        Route::get('/provider/lowongan/detail/{id}', [ProviderController::class, 'detail_lowongan']);
        Route::get('/provider/lowongan/update/{id}', [ProviderController::class, 'update_lowongan']);
        Route::post('/provider/lowongan/update/{id}', [ProviderController::class, 'change_lowongan']);
        
        Route::get('/provider/notifikasi', [ProviderController::class, 'notifikasi']);
        
        Route::get('/provider/rekrutmen', [ProviderController::class, 'rekrutmen']);
        Route::get('/provider/rekrutmen/{id}', [ProviderController::class, 'rekrutmen_detail']);
        Route::post('/provider/rekrutmen/lamaran/{id}', [ProviderController::class, 'rekrutmen_update']);


        Route::get('/provider/profile', function () {
            return view('profile_provider');
        });

        
    });



    // Admin
    Route::get('/admin/notifikasi', [AdminController::class, 'notifikasi']);
    Route::get('/admin/notifikasi/detail/{id}', [AdminController::class, 'detail_notifikasi']);
    Route::post('/admin/verifikasi/{id}', [AdminController::class, 'verifikasi']);
    Route::get('/admin/berita', [AdminController::class, 'berita']);
    Route::post('/admin/berita', [AdminController::class, 'tambahberita']);
});

Route::get('/daftar/verifikasi', function () {
    return view('verifikasi');
});
Route::post('/daftar/verifikasi/{id}', [UserController::class, 'verifikasi']);

Route::get('/logout', [UserController::class, 'logout']);
