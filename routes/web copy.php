<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\partnerController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// ## HOMEPAGE ## //
Route::get('/',[FrontEndController::class,'home'])->name('frontend.home');



// ## BANNER ## //

Route::get('/banner',[BannerController::class,'index'])->name('banner');


// ## partner ## //
Route::get('/partner',[partnerController::class,'index'])->name('partner.index');
//tambahpartner
Route::get('/partner/create', [partnerController::class, 'create'])->name('backend.partner.create');
Route::post('/partner', [partnerController::class, 'store'])->name('backend.partner.store');
//editpartner
Route::get('/backend/partner/{id}/edit', [partnerController::class, 'edit'])->name('partner.edit');
Route::put('/partner/{id}', [partnerController::class, 'update'])->name('partner.update');
Route::delete('/partner/{id}/destroy', [partnerController::class, 'destroy'])->name('partner.destroy');



