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
use Illuminate\Support\Facades\Auth;
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
                return Banner::all();
            });

            $sertifikat = Cache::remember('certificate_cache', 3600, function(){
                return Sertifikat::all();
            });

            $kegiatan = Cache::remember('kegiatan_cache', 3600, function(){
                return Kegiatan::all();
            });

            $partner = Cache::remember('partner_cache', 3600, function(){
                return Partner::all();
            });

            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

            $testimoni = Cache::remember('testimoni_cache', 3600, function(){
                return Testimoni::all();
            });


             $sosmed = Cache::remember('sosmed_cache', 3600, function(){
                return Sosmed::all();
            });


            $fasilitas = Cache::remember('fasilitas_cache', 3600,  function(){
                return Fasilitas::all();
            });


            return view('frontend.homepage.home',compact('banner','sertifikat','kegiatan','partner','program','testimoni','sosmed','fasilitas'));
        }

        public function detailProgram($id){
            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

        
            $detailProgram = Cache::remember("detailProgram_{$id}", 3600, function () use ($id) {
                return Program::find($id);
            });
            
            $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });

            return view('frontend.homepage.program.detail',compact('program','detailProgram','banner'));
        }


        public function profileQueen(){
            $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });
            
             $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

            return view('frontend.profile.index',compact('banner','program'));
        }

        
        public function fasilitas(){
            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

            $fasilitas = Cache::remember('fasilitas_cache', 3600,  function(){
                return Fasilitas::all();
            });

             $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });

            return view("frontend.fasilitas.index",compact('fasilitas','program','banner'));
        }

        public function detailFasilitas($id){
            $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

            $fasilitas = Cache::remember("fasilitas_cache_detail_{$id}", 3600,  function() use ($id){
                return Fasilitas::find($id);
            });

             $allFasilitas = Cache::remember('fasilitas_cache', 3600,  function() {
                return Fasilitas::all();
            });

             $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });

            return view('frontend.fasilitas.detail.index',compact('program','fasilitas','banner','allFasilitas'));
        }

        public function login(){
            return view('backend.auth.login');
        }

        public function loginProses(Request $request){
            $credential = $request->validate([
                'name' => ['required'],
                'password' => ['required']  
            ]);

            if(Auth::attempt($credential)){
                $request->session()->regenerate();
                return redirect()->route('banner');
            }

            return back();
        }

        public function logout(Request $request){
            Auth::logout();

            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/login');
        }
}
