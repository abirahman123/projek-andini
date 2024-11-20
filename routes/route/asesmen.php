<?php

use App\Http\Controllers\Asesmen\AsesorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Asesmen\JadwalAsesmenController;


Route::group(['prefix' => 'asesmen', 'as' => 'asesmen.'], function () {
    Route::resource('jadwal-asesmen', JadwalAsesmenController::class)->parameters(['jadwal-asesmen' => 'jadwalasesmen']);
    Route::get('jadwal-asesmen/print/{jadwalasesmen}/hasil-asesmen', [JadwalAsesmenController::class, 'printHasilAsesmen'])
        ->name('jadwal-asesmen.print.hasil-asesmen');
    Route::get('jadwal-asesmen/print/{jadwalasesmen}/surat-dispensasi-nikah', [JadwalAsesmenController::class, 'printSuratDispensasiNikah'])
        ->name('jadwal-asesmen.print.surat-dispensasi-nikah');
    Route::resource('asesor', AsesorController::class);
});
