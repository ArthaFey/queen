<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    $program = Program::when($search, function($query) use ($search) {
        $query->where('alt', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(5)
        ->appends(['search' => $search]);

        return view('backend.program.index', compact('program', 'search'));
    }

    public function create()
    {
        return view('backend.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alt' => 'required|string|max:255',
            'deskripsi' => 'required',
            'src' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('src')->store('program', 'public');
        $filename = $request->file('src')->getClientOriginalName();

        Program::create([
            'alt' => $request->alt,
            'src' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('backend.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'alt' => 'required|string|max:255',
            'deskripsi' => 'required',
            'src' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $path = $program->src;

        if ($request->hasFile('src')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('src')->store('program', 'public');
        }

        $program->update([
            'alt' => $request->alt,
            'src' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->src && Storage::disk('public')->exists($program->src)) {
            Storage::disk('public')->delete($program->src);
        }

        $program->delete();

        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus!');
    }
}