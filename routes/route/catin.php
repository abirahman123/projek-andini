<?php

use App\Http\Controllers\Admin\Catin\VerifikasiCatinController;
use App\Http\Controllers\Admin\Catin\CatinController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'catin', 'as' => 'catin.'], function () {
    Route::resource('catin', CatinController::class)->names('catin')->except('create', 'store', 'edit', 'update', 'destroy');
    Route::resource('verifikasi-catin', VerifikasiCatinController::class)->names('verifikasi-catin')->except('create', 'store', 'destroy');
    Route::get('persyaratan-catin/{catin}', [VerifikasiCatinController::class, 'persyaratanCatin'])->name('persyaratan-catin');
    Route::post('/verfikasi-dispensasi/store/{dispensasi}', [VerifikasiCatinController::class, 'verify'])->name('verifikasi-dispensasi.store');
    Route::post('/verfikasi-dispensasi/reset/{dispensasi}', [VerifikasiCatinController::class, 'reset'])->name('verifikasi-dispensasi.reset');
});

Route::resource('/pengajuan-dispensasi', \App\Http\Controllers\Catin\PengajuanDispensasiController::class)->names('pengajuan-dispensasi')->except('show');
Route::get('/pengajuan-dispensasi/{pengajuan_dispensasi}/print', [\App\Http\Controllers\Catin\PengajuanDispensasiController::class, 'print'])->name('pengajuan-dispensasi.print');
Route::resource('/berkas-persyaratan', \App\Http\Controllers\Catin\BerkasPersyaratanController::class)->names('berkas-persyaratan')->except(['show', 'create', 'store', 'destroy', 'update']);
Route::get('/berkas-persyaratan/detail/{catin}', [\App\Http\Controllers\Catin\BerkasPersyaratanController::class, 'detail'])->name('berkas-persyaratan.detail');
Route::put('/berkas-persyaratan/detail/upload/{id?}', [\App\Http\Controllers\Catin\BerkasPersyaratanController::class, 'upload'])->name('berkas-persyaratan.upload');
Route::get('/berkas-persyaratan/detail/{persyaratan}/edit', [\App\Http\Controllers\Catin\BerkasPersyaratanController::class, 'edit_detail'])->name('berkas-persyaratan.edit_detail');
Route::get('/jadwal-asesmen', [\App\Http\Controllers\Catin\JadwalAsesmenController::class, 'index'])->name('jadwal-assesmen.index');
//Route::group(['prefix' => 'registrasi-catin', 'as' => 'registrasi-catin.'], function () {
//    Route::get('/', [\App\Http\Controllers\Catin\PengajuanDispensasiController::class, "index"])->name('index');
//});
