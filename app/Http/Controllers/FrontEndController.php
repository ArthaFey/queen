<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Kegiatan;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FrontEndController extends Controller
{
        public function home(){
            // PUT Data in Cache
            // Cache::put('banner_cache', $banner, 60);

            // GET Data in Cache
            // $cacheBanner = Cache::get('banner_cache');



            // PUT AND GET JIKA DATA YANG DI GET ADA 
            $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all()->toArray();
            });

            $sertifikat = Cache::remember('certificate_cache', 3600, function(){
                return Sertifikat::all()->toArray();
            });

            $kegiatan = Cache::remember('kegiatan_cache', 3600, function(){
                return Kegiatan::all()->toArray();
            });


            $partner = Cache::remember('partner_cache', 3600, function () {
                return Partner::all()->toArray();
            });

            $program = Cache::remember('program_cache',3600,function(){
                return Program::all()->toArray(); 
            });


            return view('frontend.homepage.home',compact('banner','sertifikat','kegiatan','partner','program'));
        }
}
