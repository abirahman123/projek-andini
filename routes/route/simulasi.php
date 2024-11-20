<?php

use App\Http\Controllers\SimulasiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'simulasi', 'as' => 'simulasi.'], function () {
    Route::get('/jabatan-fungsional', [SimulasiController::class, 'jabatanFungsional'])->name('jabatan');
    Route::get('/database-transaction', [SimulasiController::class, 'databaseTransaction'])->name('dbTransaction');
});
?>