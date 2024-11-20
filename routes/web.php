<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Guest\NewsController;
use App\Http\Controllers\DownloadDokumenController;

use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\JadwalAsesmenController;
use App\Http\Controllers\InstansiController;

use App\Http\Controllers\Assesor\ProfileAsesorController;
use App\Http\Controllers\LandingController;

Auth::routes(
    [
        'verify' => true,
    ]
);






Route::get('/end-impersonation', [ImpersonateController::class, 'leaveImpersonation'])->name('leaveImpersonation');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    require_once __DIR__ . '/route/admin/setting.php';
    require_once __DIR__ . '/route/admin/usermanagement.php';
    require_once __DIR__ . '/route/admin/cms.php';
    require_once __DIR__ . '/route/admin/mapingassesor.php';
    require_once __DIR__ . '/route/asesor/data-catin.php';
    require_once __DIR__ . '/route/asesor/catin-asesmen.php';
    require_once __DIR__ . '/route/reference.php';
    require_once __DIR__ . '/route/asesmen.php';
    require_once __DIR__ . '/route/catin.php';
    require_once __DIR__ . '/route/master.php';
});

require_once __DIR__ . '/route/assesor/CatinPersyaratan.php';

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/chart', [LandingController::class, 'chart'])->name('chart');


// Route::get('/unduh', function () {
//     return view('pages.landing.unduh');
// })->name("unduh");
Route::get('/unduh', [DownloadDokumenController::class, 'index'])->name('unduh');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/search', [NewsController::class, 'search'])->name('search');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.detail');
Route::get('/news/kategori/{id}', [NewsController::class, 'sortingKategori'])->name('news.kategori');

Route::get('/setting/profile', [ProfileAsesorController::class, 'index'])->name('profile.show');

