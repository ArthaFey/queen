<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// ## HOMEPAGE ##
Route::get('/', [FrontEndController::class, 'home'])->name('frontend.home');

// ## BANNER ##
Route::get('/banner', [BannerController::class, 'index'])->name('banner');

// ## KEGIATAN ## 
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');      // List kegiatan
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); // Form tambah
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');         // Simpan baru
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy'); // Hapus data