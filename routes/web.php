<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
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


route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Main\ViewController::class, 'dashboard'])->name('dashboard');

Route::prefix('pasien')->group(function () {
    Route::get('/', [App\Http\Controllers\Main\ViewController::class, 'pasien'])->name('pasien');

    Route::controller(PasienController::class)->group(function () {
        Route::get('/tambah', 'add');
        Route::get('/edit/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
        Route::put('/update/{id}', 'update');
        Route::post('/create', 'create');
    });

});

Route::prefix('dokter')->group(function () {
    Route::get('/', [App\Http\Controllers\Main\ViewController::class, 'dokter']);

    Route::controller(DokterController::class)->group(function () {
        Route::get('/tambah', 'add');
        Route::get('/edit/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
        Route::put('/update/{id}', 'update');
        Route::post('/create', 'create');
    });

});

Route::prefix('obat')->group(function () {
    Route::get('/', [App\Http\Controllers\Main\ViewController::class, 'obat']);

    Route::controller(ObatController::class)->group(function () {
        Route::get('/tambah', 'add');
        Route::get('/edit/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
        Route::put('/update/{id}', 'update');
        Route::post('/create', 'create');
    });

});

Route::prefix('tagihan')->group(function () {
    Route::get('/', [App\Http\Controllers\Main\ViewController::class, 'tagihan']);

    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/tambah', 'add');
        Route::get('/edit/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
        Route::put('/update/{id}', 'update');
        Route::post('/create', 'store');
    });

});