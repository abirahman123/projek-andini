<?php

use App\Http\Controllers\Catin\CatinController;


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'catin', 'as' => 'Catin.'], function () {

    Route::get('/upload', [CatinController::class, 'index'])->name('Catin.Upload');
    Route::get('/upload/persyaratan', [CatinController::class, 'create']);
});
