<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

// ## HOMEPAGE ## //
Route::get('/',[FrontEndController::class,'home'])->name('frontend.home');



// ## BANNER ## //
Route::get('/banner',[BannerController::class,'index'])->name('banner');

