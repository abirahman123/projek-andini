<?php

use App\Http\Controllers\Cms\DokumenController;
use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Cms\SlideShowController;
use App\Http\Controllers\Cms\SlideShowItemController;
use App\Http\Controllers\Cms\FileManagerController;
use App\Http\Controllers\Cms\FAQsController;
use App\Http\Controllers\Cms\KategoriBeritaController;
use App\Http\Controllers\Cms\TimelineController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('/slideshow/histori', [SlideShowController::class, 'index'])->name('slideshow.histori');
    Route::resource('/slideshow', SlideShowController::class)->names('slideshow');
    Route::put('/slideshow/restore/{slideshow}', [SlideShowController::class, 'restore'])->name('slideshow.restore');

    Route::get('/slideshow/item/download/{image}', [SlideShowItemController::class, 'download'])->name('slideshow-item.download');
    Route::get('/slideshow/{slideshow}/item/histori', [SlideShowItemController::class, 'index'])->name('slideshow-item.histori');
    Route::put('/slideshow/{slideshow}/item/restore/{item}', [SlideShowItemController::class, 'restore'])->name('slideshow-item.restore');
    Route::resource('/slideshow/{slideshow}/item', SlideShowItemController::class)->names('slideshow-item');

    Route::resource('/file-manager', FileManagerController::class)->names('file-manager');
    Route::get('/file-manager/download/{file}', [FileManagerController::class, 'download'])->name('file-manager.download');

    Route::resource('/news', NewsController::class)->names('news');

    Route::get('/document/download/{document}', [DokumenController::class, 'download'])->name('document.download');
    Route::put('/document/restore/{document}', [DokumenController::class, 'restore'])->name('document.restore');
    Route::get('/document/history', [DokumenController::class, 'index'])->name('document.history');
    Route::resource('/document', DokumenController::class)->names('document');

    Route::resource('/faqs', FAQsController::class)->names('faqs')->except(['show']);
    Route::get('/faqs/histori', [FAQsController::class, 'index'])->name('faqs.histori');
    Route::put('/faqs/restore/{faq}', [FAQsController::class, 'restore'])->name('faqs.restore');

    Route::resource('/kategori-berita', KategoriBeritaController::class)->names('kategori-berita')->except('create', 'show');
    Route::get('/kategori-berita/histori', [KategoriBeritaController::class, 'index'])->name('kategori-berita.histori');
    Route::put('/kategori-berita/restore/{id}', [KategoriBeritaController::class, 'restore'])->name('kategori-berita.restore');
});
