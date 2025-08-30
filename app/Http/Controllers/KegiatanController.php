<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Menampilkan daftar kegiatan di halaman backend dengan pencarian & pagination
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil kata kunci pencarian

        $kegiatan = Kegiatan::when($search, function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('backend.kegiatan.index', compact('kegiatan', 'search'));
    }

    /**
     * Menampilkan daftar kegiatan di halaman frontend dengan pagination
     */
    public function indexFrontend(Request $request)
    {
        $perPage = 6;
        $kegiatan = Kegiatan::latest()->paginate($perPage);

        return view('frontend.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Tampilkan form tambah kegiatan
     */
    public function create()
    {
        return view('backend.kegiatan.create');
    }

    /**
     * Simpan data kegiatan baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        // Upload gambar ke folder storage/public/kegiatan
        $path = $request->file('image')->store('kegiatan', 'public');

        // Simpan data ke database
        Kegiatan::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image' => $path,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('backend.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update data kegiatan
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Validasi input (gambar opsional)
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        $path = $kegiatan->image; // Path gambar lama

        // Jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            // Upload gambar baru
            $path = $request->file('image')->store('kegiatan', 'public');
        }

        // Update data ke database
        $kegiatan->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image' => $path,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus data kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($kegiatan->image && Storage::disk('public')->exists($kegiatan->image)) {
            Storage::disk('public')->delete($kegiatan->image);
        }

        // Hapus data dari database
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
