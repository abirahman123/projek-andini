<?php

use App\Http\Controllers\CatinPersyaratanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'assesor', 'as' => 'assesor.'], function () {
    Route::get('/catin-persyaratan', [CatinPersyaratanController::class, 'catinPersyaratan'])->name('catin');
});

?>