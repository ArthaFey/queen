<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Controller;

// ## HOMEPAGE ## //
Route::get('/',[FrontEndController::class,'home'])->name('frontend.home');



// ## BANNER ## //
Route::get('/banner',[BannerController::class,'index'])->name('banner');

// ## PROGRAM ## //
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');      // List program
Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create'); // Form tambah
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');         // Simpan baru
Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy'); // Hapus data