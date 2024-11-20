<?php

use App\Http\Controllers\Catin\CatinController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'asesor', 'as' => 'asesor.'], function () {

    Route::get('/data-catin', [CatinController::class, "index"])->name('asesor.data-catin');
});
