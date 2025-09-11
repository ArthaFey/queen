<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    // Tampilkan daftar banner + fitur pencarian + pagination
    public function index(Request $request)
    {
        // Ambil keyword dari form search
        $search = $request->input('search');

        // Query banner dengan pencarian
        $banners = Banner::when($search, function ($query, $search) {
                return $query->where('alt', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString(); // Agar pagination tetap menyertakan keyword pencarian

        return view('backend.banner.index', compact('banners', 'search'));
    }

    //Tampilkan form tambah banner
     
    public function create()
    {
        return view('backend.banner.create');
    }

    // Simpan banner baru ke database
     
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'alt' => 'required|string|max:255',
            'src' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = null;

        // Upload file gambar
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);
        }

        // Simpan data ke database
        $banner = Banner::create([
            'alt' => $request->alt,
            'src' => $filename
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner berhasil ditambahkan');
    }

    
     // Tampilkan form edit banner
     
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit', compact('banner'));
    }

    // Update data banner di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'alt' => 'required|string|max:255',
            'src' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        // Jika ada file baru, hapus lama & simpan baru
        if ($request->hasFile('src')) {
            // Hapus gambar lama jika ada
            if ($banner->src && file_exists(public_path('uploads/banner/' . $banner->src))) {
                unlink(public_path('uploads/banner/' . $banner->src));
            }

            // Upload gambar baru
            $file = $request->file('src');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);

            $banner->src = $filename;
        }

        // Update alt text
        $banner->alt = $request->alt;
        $banner->save();

        Cache::forget('banner_cache');


        return redirect()->route('banners.index')->with('success', 'Banner berhasil diperbarui');
    }

    
     // Hapus banner dari database
  
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Hapus file gambar jika ada
        if ($banner->src && file_exists(public_path('uploads/banner/' . $banner->src))) {
            unlink(public_path('uploads/banner/' . $banner->src));
        }

        // Hapus data dari database
        $banner->delete();
        
        Cache::forget('banner_cache');


        return redirect()->route('banners.index')->with('success', 'Banner berhasil dihapus');
    }
}
