<?php

namespace App\Http\Controllers;

use App\Models\LokasiDaurUlang;
use Illuminate\Http\Request;

class LokasiDaurUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LokasiDaurUlang::query();
        
        // Filter berdasarkan kota
        if ($request->has('kota') && $request->kota != '') {
            $query->where('kota', $request->kota);
        }
        
        // Filter berdasarkan jenis sampah
        if ($request->has('jenis_sampah') && $request->jenis_sampah != '') {
            $query->where('jenis_sampah_diterima', 'like', '%' . $request->jenis_sampah . '%');
        }
        
        $lokasi = $query->get();
        
        // Ambil daftar kota untuk filter
        $kota = LokasiDaurUlang::select('kota')->distinct()->pluck('kota');
        
        return view('pages.lokasi', compact('lokasi', 'kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'jenis_sampah_diterima' => 'required|string',
            'jam_operasional' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        
        LokasiDaurUlang::create($validated);
        
        return redirect()->route('pages.lokasi')
                        ->with('success', 'Lokasi daur ulang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LokasiDaurUlang $lokasi)
    {
        return view('lokasi.show', compact('lokasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LokasiDaurUlang $lokasi)
    {
        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LokasiDaurUlang $lokasi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'jenis_sampah_diterima' => 'required|string',
            'jam_operasional' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        
        $lokasi->update($validated);
        
        return redirect()->route('pages.lokasi')
                        ->with('success', 'Lokasi daur ulang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LokasiDaurUlang $lokasi)
    {
        $lokasi->delete();
        
        return redirect()->route('pages.lokasi')
                        ->with('success', 'Lokasi daur ulang berhasil dihapus.');
    }
}