<?php

use App\Http\Controllers\Asesor\CatinAsesmenController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'asesor', 'as' => 'asesor.'], function () {
    route::resource('catin-asesmen', CatinAsesmenController::class)->names('catin-asesmen')->parameter('catin-asesmen', 'catin_asesmen');
    Route::get('catin-asesmen/{catin_asesmen}/print/asesmen-penilaian', [CatinAsesmenController::class, 'printAsesmenPenilaian'])
        ->name('catin-asesmen.print.asesmen-penilaian');
});
