<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed;
use Illuminate\Support\Facades\Storage;

class SosmedController extends Controller
{
    /**
     * Menampilkan daftar sosmed di halaman backend dengan pencarian & pagination
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sosmeds = Sosmed::when($search, function ($query) use ($search) {
                $query->where('link', 'like', "%{$search}%")
                      ->orWhere('color', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('backend.sosmed.index', compact('sosmeds', 'search'));
    }

    /**
     * Tampilkan form tambah sosmed
     */
    public function create()
    {
        return view('backend.sosmed.create');
    }

    /**
     * Simpan data sosmed baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'color' => 'nullable|string|max:20',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        // Upload image
        $path = $request->file('image')->store('sosmed', 'public');

        Sosmed::create([
            'name' => $request->name,
            'link' => $request->link,
            'color' => $request->color,
            'image' => $path,
        ]);

        return redirect()->route('sosmed.index')->with('success', 'Sosmed berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit sosmed
     */
    public function edit($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        return view('backend.sosmed.edit', compact('sosmed'));
    }

    /**
     * Update data sosmed
     */
    public function update(Request $request, $id)
    {
        $sosmed = Sosmed::findOrFail($id);

        $request->validate([
            'link' => 'required|url',
            'color' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
        ]);

        $path = $sosmed->image;

        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('image')->store('sosmed', 'public');
        }

        $sosmed->update([
            'name' => $request->name,
            'link' => $request->link,
            'color' => $request->color,
            'image' => $path,
        ]);

        return redirect()->route('sosmed.index')->with('success', 'Sosmed berhasil diperbarui!');
    }

    /**
     * Hapus data sosmed
     */
    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);

        if ($sosmed->image && Storage::disk('public')->exists($sosmed->image)) {
            Storage::disk('public')->delete($sosmed->image);
        }

        $sosmed->delete();

        return redirect()->route('sosmed.index')->with('success', 'Sosmed berhasil dihapus!');
    }
}
