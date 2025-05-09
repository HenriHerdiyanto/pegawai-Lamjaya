<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/provinsi/store', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::put('/provinsi/update/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');

// kecamatan
Route::resource('kecamatan', KecamatanController::class);

// kelurahan
Route::resource('kelurahan', KelurahanController::class);

// Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
// Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
// Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
// Route::delete('pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');


Route::resource('pegawais', App\Http\Controllers\PegawaiController::class);
