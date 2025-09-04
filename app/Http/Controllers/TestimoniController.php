<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestimoniController extends Controller
{
    // Tampilkan daftar testimoni + fitur pencarian + pagination
    public function index(Request $request)
    {
        // Ambil keyword dari form search
        $search = $request->input('search');

        // Query testimoni dengan pencarian
        $testimonis = Testimoni::when($search, function ($query, $search) {
                return $query->where('alt', 'like', '%' . $search . '%')
                             ->orWhere('review', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString(); // Agar pagination tetap menyertakan keyword pencarian

        return view('backend.testimoni.index', compact('testimonis', 'search'));
    }

    // Tampilkan form tambah testimoni
    public function create()
    {
        return view('backend.testimoni.create');
    }

    // Simpan testimoni baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'alt' => 'required|string|max:255',
            'review' => 'required|string',
            'src' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = null;

        // Upload file gambar
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimoni'), $filename);
        }

        // Simpan data ke database
        $testimoni = Testimoni::create([
            'alt' => $request->alt,
            'review' => $request->review,
            'src' => $filename
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    // Tampilkan form edit testimoni
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('backend.testimoni.edit', compact('testimoni'));
    }

    // Update data testimoni di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'alt' => 'required|string|max:255',
            'review' => 'required|string',
            'src' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $testimoni = Testimoni::findOrFail($id);

        // Jika ada file baru, hapus lama & simpan baru
        if ($request->hasFile('src')) {
            // Hapus gambar lama jika ada
            if ($testimoni->src && file_exists(public_path('uploads/testimoni/' . $testimoni->src))) {
                unlink(public_path('uploads/testimoni/' . $testimoni->src));
            }

            // Upload gambar baru
            $file = $request->file('src');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimoni'), $filename);

            $testimoni->src = $filename;
        }

        // Update data
        $testimoni->alt = $request->alt;
        $testimoni->review = $request->review;
        $testimoni->save();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui');
    }

    // Hapus testimoni dari database
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus file gambar jika ada
        if ($testimoni->src && file_exists(public_path('uploads/testimoni/' . $testimoni->src))) {
            unlink(public_path('uploads/testimoni/' . $testimoni->src));
        }

        // Hapus data dari database
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
