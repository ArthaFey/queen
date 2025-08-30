<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    /**
     * Tampilkan daftar sertifikat + fitur search & pagination
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sertifikats = Sertifikat::when($search, function ($query, $search) {
                return $query->where('alt', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5) // jumlah data per halaman
            ->appends($request->query()); // agar query search ikut di pagination

        return view('backend.sertifikat.index', compact('sertifikats'));
    }

    /**
     * Form tambah sertifikat
     */
    public function create()
    {
        return view('backend.sertifikat.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'alt' => 'required|string|max:255',
            'src' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('src')->store('sertifikat', 'public');

        Sertifikat::create([
            'alt' => $request->alt,
            'src' => $path,
        ]);

        return redirect()
            ->route('sertifikat.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    /**
     * Form edit sertifikat
     */
    public function edit($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        return view('backend.sertifikat.edit', compact('sertifikat'));
    }

    /**
     * Update data sertifikat
     */
    public function update(Request $request, $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        $request->validate([
            'alt' => 'required|string|max:255',
            'src' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $sertifikat->alt = $request->alt;

        if ($request->hasFile('src')) {
            $path = $request->file('src')->store('sertifikat', 'public');
            $sertifikat->src = $path;
        }

        $sertifikat->save();

        return redirect()
            ->route('sertifikat.index')
            ->with('success', 'Sertifikat berhasil diperbarui.');
    }

    /**
     * Hapus sertifikat
     */
    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->delete();

        return redirect()
            ->route('sertifikat.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}
