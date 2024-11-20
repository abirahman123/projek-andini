<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferenceController;

Route::group(['prefix' => 'reference', 'as' => 'reference.'], function () {
    Route::get('/user', [ReferenceController::class, 'user'])->name('user');
    Route::get('/icon', [ReferenceController::class, 'icon'])->name('icon');
    Route::get('/kategori_berita', [ReferenceController::class, 'kategori_berita'])->name('kategori_berita');
    Route::get('/periode', [ReferenceController::class, 'periode'])->name('periode');
    Route::get('/register', [ReferenceController::class, 'register'])->name('register');
    Route::get('/kecamatan', [ReferenceController::class, 'kecamatan'])->name('kecamatan');
    Route::get('/kelurahan', [ReferenceController::class, 'kelurahan'])->name('kelurahan');
    Route::get('/pegawai', [ReferenceController::class, 'pegawai'])->name('pegawai');
    Route::get('/assesor', [ReferenceController::class, 'assesor'])->name('assesor');
});
