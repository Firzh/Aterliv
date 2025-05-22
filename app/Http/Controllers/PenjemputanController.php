<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjemputan;

class PenjemputanController extends Controller
{
    // Form buat permintaan
    public function create()
    {
        return view('penjemputan.create');
    }

    // Simpan permintaan ke DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_penjemputan' => 'required|date',
        ]);

        Penjemputan::create($validated);

        return redirect()->back()->with('success', 'Permintaan berhasil dikirim!');
    }

    // List permintaan yang belum approved (admin)
    public function index()
    {
        $data = Penjemputan::where('approved', false)->get();
        return view('penjemputan.index', compact('data'));
    }

    // Approve permintaan (admin)
    public function approve($id)
    {
        $penjemputan = Penjemputan::findOrFail($id);
        $penjemputan->approved = true;
        $penjemputan->save();

        // Setelah approve, hapus data dari DB
        $penjemputan->delete();

        return redirect()->back()->with('success', 'Permintaan disetujui dan dihapus.');
    }
}
