<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PartnerController extends Controller
{
    /**
     * Tampilkan semua data partner.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $partners = Partner::when($search, function ($query, $search) {
                return $query->where('src', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5) // jumlah data per halaman
            ->appends($request->query()); // agar query search ikut di pagination

        return view('backend.partner.index', compact('partners'));
    }


    /**
     * Form tambah data partner.
     */
    public function create()
    {
        return view('backend.partner.create');
    }

    /**
     * Simpan data partner baru.
     */
    public function store(Request $request)
    {
        // ✅ Validasi data
        $request->validate([
            'src' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Upload file ke storage/app/public/partner
        $path = $request->file('src')->store('partner', 'public');

        // ✅ Simpan ke database
        Partner::create([
            'src' => $path,
        ]);

        return redirect()
            ->route('partner.index')
            ->with('success', 'Partner berhasil ditambahkan.');
    }

    /**
     * Form edit data partner.
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('backend.partner.edit', compact('partner'));
    }

    /**
     * Update data partner.
     */
    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        // ✅ Validasi alt wajib diisi
        $request->validate([
            'src' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Jika ada file baru, upload & ganti
        if ($request->hasFile('src')) {
            $path = $request->file('src')->store('partner', 'public');
            $partner->src = $path;
        }

        $partner->save();

        Cache::forget('partner_cache');

        return redirect()
            ->route('partner.index')
            ->with('success', 'Partner berhasil diperbarui.');
    }

    /**
     * Hapus data partner.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        Cache::forget('partner_cache');

        return redirect()
            ->route('partner.index')
            ->with('success', 'Partner berhasil dihapus.');
    }
}
