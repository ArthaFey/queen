<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Tampilkan daftar fasilitas di backend (dengan pencarian & pagination)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $fasilitas = Fasilitas::when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('backend.fasilitas.index', compact('fasilitas', 'search'));
    }

    /**
     * Tampilkan daftar fasilitas di frontend (dengan pagination)
     */
    public function indexFrontend(Request $request)
    {
        $perPage = 6;
        $fasilitas = Fasilitas::latest()->paginate($perPage);

        return view('frontend.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Form tambah fasilitas
     */
    public function create()
    {
        return view('backend.fasilitas.create');
    }

    /**
     * Simpan fasilitas baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        $path = $request->file('image')->store('fasilitas', 'public');

        Fasilitas::create([
            'title' => $validated['title'],
            'deskripsi' => $validated['deskripsi'],
            'image' => $path,
        ]);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Form edit fasilitas
     */
    public function edit(int $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('backend.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update fasilitas
     */
    public function update(Request $request, int $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        $path = $fasilitas->image;

        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('image')->store('fasilitas', 'public');
        }

        $fasilitas->update([
            'title' => $validated['title'],
            'deskripsi' => $validated['deskripsi'],
            'image' => $path,
        ]);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /**
     * Hapus fasilitas
     */
    public function destroy(int $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        if ($fasilitas->image && Storage::disk('public')->exists($fasilitas->image)) {
            Storage::disk('public')->delete($fasilitas->image);
        }

        $fasilitas->delete();

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }
}
