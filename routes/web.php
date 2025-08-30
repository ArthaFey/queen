<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

/*Web Routes*/

// HOMEPAGE 
Route::get('/', [FrontEndController::class, 'home'])->name('frontend.home');


// BANNER CRUD 

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
