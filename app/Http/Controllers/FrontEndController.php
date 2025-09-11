<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Fasilitas;
use App\Models\Kegiatan;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Sertifikat;
use App\Models\Sosmed;
use App\Models\Testimoni;
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

            $partner = Cache::remember('partner_cache', 3600, function(){
                return Partner::all()->toArray();
            });

            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all()->toArray();
            });

            $testimoni = Cache::remember('testimoni_cache', 3600, function(){
                return Testimoni::all()->toArray();
            });


             $sosmed = Cache::remember('sosmed_cache', 3600, function(){
                return Sosmed::all()->toArray();
            });


            $fasilitas = Cache::remember('fasilitas_cache', 3600,  function(){
                return Fasilitas::all()->toArray();
            });


            return view('frontend.homepage.home',compact('banner','sertifikat','kegiatan','partner','program','testimoni','sosmed','fasilitas'));
        }

        public function detailProgram($id){
            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all()->toArray();
            });

        
            $detailProgram = Cache::remember("detailProgram_{$id}", 3600, function () use ($id) {
                return Program::find($id);
            });
            
            $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all()->toArray();
            });

            return view('frontend.homepage.program.detail',compact('program','detailProgram','banner'));
        }


        public function profileQueen(){
            $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all()->toArray();
            });
            
             $program = Cache::remember('program_cache', 3600, function(){
                return Program::all()->toArray();
            });

            return view('frontend.profile.index',compact('banner','program'));
        }
}
