<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JabatanFungsiController;

use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\PeriodeController;
use App\Http\Controllers\Kecamatan\KecamatanController;
use App\Http\Controllers\Kelurahan\KelurahanController;
use App\Http\Controllers\Master\PersyaratanDispensasiController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Models\Master\JabatanFungsional;

Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
    Route::resource('/periode', PeriodeController::class)->names('periode')->except('create', 'show');
    Route::put('/periode/{periode}', [PeriodeController::class, 'activate'])
        ->name('periode.activate');

    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/kecamatan', KecamatanController::class)->names('kecamatan');
    Route::resource('/kelurahan', KelurahanController::class)->names('kelurahan');
    Route::resource('/persyaratan', PersyaratanDispensasiController::class)->names('persyaratan');
    Route::get('/persyaratan-dispensasi/download/{file_pendukung}', [PersyaratanDispensasiController::class, 'download'])->name('persyaratan-dispensasi.download');
    Route::resource('/instansi', InstansiController::class)->names('instansi');
    Route::resource('/jabatan', JabatanFungsionalController::class)->names('jabatan')->except(['destroy', 'show']);
    Route::resource('/persyaratan-dispensasi', PersyaratanDispensasiController::class)->names('persyaratan-dispensasi');
    Route::get('/persyaratan-dispensasi/download/{file_pendukung}', [PersyaratanDispensasiController::class, 'download'])->name('persyaratan-dispensasi.download');
});
