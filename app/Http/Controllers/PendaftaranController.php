<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Pendaftaran;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PendaftaranController extends Controller
{
    public function index(){
        $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

        $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });
        return view('frontend.form-pendaftaran.index',compact('program','banner'));
    }

    public function insert(Request $request){
        $pendaftaran = Pendaftaran::create($request->all());
        return redirect()->route('frontend.home');
    }


    public function indexBackend(Request $request){

        $search = $request->search;

        $data = Pendaftaran::orderByDesc('created_at')
                            ->where('nama','like',"%".$search."%")
                            ->paginate(10);

        $program = Cache::remember('program_cache', 3600, function(){
                return Program::all();
            });

        $banner = Cache::remember('banner_cache', 3600, function(){
                return Banner::all();
            });
        return view('backend.data-siswa.index',compact('program','banner','data'));
    }

    public function detail($id){
        $data = Pendaftaran::findOrFail($id);
        return view('backend.data-siswa.detail',compact('data'));
    }

}
