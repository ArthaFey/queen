<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FrontEndController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// HOMEPAGE
// =======================
Route::get('/', [FrontEndController::class, 'home'])
    ->name('frontend.home');

// =======================
// BANNER
// =======================
Route::get('/banner', [BannerController::class, 'index'])
    ->name('banner');

// =======================
// SERTIFIKAT
// =======================
Route::prefix('sertifikat')->group(function () {
    Route::get('/', [SertifikatController::class, 'index'])->name('sertifikat.index');

    // Tambah
    Route::get('/create', [SertifikatController::class, 'create'])->name('backend.sertifikat.create');
    Route::post('/', [SertifikatController::class, 'store'])->name('backend.sertifikat.store');

    // Edit / Update
    Route::get('/{id}/edit', [SertifikatController::class, 'edit'])->name('sertifikat.edit');
    Route::put('/{id}', [SertifikatController::class, 'update'])->name('sertifikat.update');

    // Hapus
    Route::delete('/{id}/destroy', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
});

// =======================
// PARTNER
// =======================
Route::prefix('partner')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('partner.index');

    // Tambah
    Route::get('/create', [PartnerController::class, 'create'])->name('backend.partner.create');
    Route::post('/', [PartnerController::class, 'store'])->name('backend.partner.store');

    // Edit / Update
    Route::get('/{id}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/{id}', [PartnerController::class, 'update'])->name('partner.update');

    // Hapus
    Route::delete('/{id}/destroy', [PartnerController::class, 'destroy'])->name('partner.destroy');
});
