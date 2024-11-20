<?php

use App\Http\Controllers\Master\KecamatanController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'master', 'as' => 'master.'], function () {

    Route::get('/kecamatan', [KecamatanController::class, "saya"])->name('master.kecamatan');


});