<?php

use App\Http\Controllers\Admin\Asesment\MapingAsesorController;
use Illuminate\Support\Facades\Route;

Route::prefix('asesmen')->as('asesmen.')->group(function () {
    // Route::get('/asesor-maping', [MapingAsesorController::class, 'index'])->name('index');
    Route::resource('/asesor-maping', MapingAsesorController::class)->names('maping');
});
