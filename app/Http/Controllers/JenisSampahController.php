<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisSampah = JenisSampah::all();
        return view('pages.jenis-sampah', compact('jenisSampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ciri_ciri' => 'required|string',
            'contoh' => 'required|string',
            'cara_daur_ulang' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('jenis-sampah', 'public');
            $validated['gambar'] = $gambarPath;
        }
        
        JenisSampah::create($validated);
        
        return redirect()->route('pages.jenis-sampah')
                        ->with('success', 'Jenis sampah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSampah $jenisSampah)
    {
        return view('jenis-sampah.show', compact('jenisSampah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSampah $jenisSampah)
    {
        return view('jenis-sampah.edit', compact('jenisSampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSampah $jenisSampah)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ciri_ciri' => 'required|string',
            'contoh' => 'required|string',
            'cara_daur_ulang' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($jenisSampah->gambar) {
                Storage::disk('public')->delete($jenisSampah->gambar);
            }
            
            $gambarPath = $request->file('gambar')->store('jenis-sampah', 'public');
            $validated['gambar'] = $gambarPath;
        }
        
        $jenisSampah->update($validated);
        
        return redirect()->route('pages.jenis-sampah')
                        ->with('success', 'Jenis sampah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSampah $jenisSampah)
    {
        // Hapus gambar jika ada
        if ($jenisSampah->gambar) {
            Storage::disk('public')->delete($jenisSampah->gambar);
        }
        
        $jenisSampah->delete();
        
        return redirect()->route('pages.jenis-sampah')
                        ->with('success', 'Jenis sampah berhasil dihapus.');
    }
}