<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Cache;

// =======================
// HOMEPAGE
// =======================
Route::get('/',[FrontEndController::class,'home'])->name('frontend.home');


// =======================
// KEGIATAN
// =======================
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');      // List kegiatan
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); // Form tambah
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');         // Simpan baru
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy'); // Hapus data


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


// =======================
// BANNER
// =======================
// Route lama tetap dipakai (akses /banner untuk daftar)
Route::get('/banner', [BannerController::class, 'index'])->name('banner');
// Route daftar banner 
Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
// Form tambah banner
Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
// Simpan banner baru
Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
// Form edit banner 
Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
// Update banner
Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
// Hapus banner
Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');



// =======================
// PROGRAM
// =======================
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');      // List program
Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create'); // Form tambah
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');         // Simpan baru
Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');