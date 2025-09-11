<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SosmedController;
use Illuminate\Support\Facades\Cache;

// =======================
// FRONTEND
// =======================
Route::get('/',[FrontEndController::class,'home'])->name('frontend.home');
Route::get('/detail-program/{id}',[FrontEndController::class,'detailProgram'])->name('detail.program');
Route::get('/queen-profile',[FrontEndController::class,'profileQueen'])->name('profile.queen');


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

// =======================
// ## SOSMED ##
// =======================
Route::get('/sosmed', [SosmedController::class, 'index'])->name('sosmed.index');      // List sosmed
Route::get('/sosmed/create', [SosmedController::class, 'create'])->name('sosmed.create'); // Form tambah
Route::post('/sosmed', [SosmedController::class, 'store'])->name('sosmed.store');        // Simpan baru
Route::get('/sosmed/{id}/edit', [SosmedController::class, 'edit'])->name('sosmed.edit'); // Form edit
Route::put('/sosmed/{id}', [SosmedController::class, 'update'])->name('sosmed.update');  // Update data
Route::delete('/sosmed/{id}', [SosmedController::class, 'destroy'])->name('sosmed.destroy'); // Hapus data
// =======================
// TESTIMONI
// =======================
Route::get('/testimoni', [\App\Http\Controllers\TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/testimoni/create', [\App\Http\Controllers\TestimoniController::class, 'create'])->name('testimoni.create');
Route::post('/testimoni', [\App\Http\Controllers\TestimoniController::class, 'store'])->name('testimoni.store');
Route::get('/testimoni/{id}/edit', [\App\Http\Controllers\TestimoniController::class, 'edit'])->name('testimoni.edit');
Route::put('/testimoni/{id}', [\App\Http\Controllers\TestimoniController::class, 'update'])->name('testimoni.update');
Route::delete('/testimoni/{id}', [\App\Http\Controllers\TestimoniController::class, 'destroy'])->name('testimoni.destroy');

// =======================
// Fasilitas Routes
// =======================
Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
    // Index
    Route::get('/', [fasilitasController::class, 'index'])->name('index');

    // Tambah
    Route::get('/create', [fasilitasController::class, 'create'])->name('create');
    Route::post('/', [fasilitasController::class, 'store'])->name('store');

    // Edit / Update
    Route::get('/{id}/edit', [fasilitasController::class, 'edit'])->name('edit');
    Route::put('/{id}', [fasilitasController::class, 'update'])->name('update');

    // Hapus
    Route::delete('/{id}', [fasilitasController::class, 'destroy'])->name('destroy');
});