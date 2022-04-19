<?php

use Illuminate\Support\Facades\Route;

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


// Karrir

Route::get('/', function () {
    return view('home_karrir',['login' => 'true']);
});

// Provider
Route::get('/provider', function () {
    return view('home_provider',['login' => 'true']);
});