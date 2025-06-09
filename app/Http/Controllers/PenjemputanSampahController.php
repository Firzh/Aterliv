<?php

namespace App\Http\Controllers;

use App\Models\PenjemputanSampah;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjemputanSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $penjemputan = PenjemputanSampah::with('user')->latest()->get();
        } else {
            $penjemputan = PenjemputanSampah::where('user_id', Auth::id())->latest()->get();
        }
        
        return view('pages.jemput', compact('penjemputan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSampah = JenisSampah::all();
        return view('pages.jemput.create', compact('jenisSampah'));
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
            'telepon' => 'required|string|max:20',
            'tanggal_penjemputan' => 'required|date|after_or_equal:today',
            'waktu_penjemputan' => 'required',
            'jenis_sampah' => 'required|string',
            'perkiraan_berat' => 'required|numeric|min:1',
            'catatan' => 'nullable|string',
        ]);
        
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'menunggu';
        
        PenjemputanSampah::create($validated);
        
        return redirect()->route('pages.jemput.index')
                        ->with('success', 'Permintaan penjemputan sampah berhasil dibuat.');

        PickupRequest::create([
            'user_id' => auth()->id(),
            'sampah_jenis' => $request->sampah_jenis,
            'berat' => $request->berat,
            'status' => 'menunggu',
        ]);

        return back()->with('success', 'Permintaan penjemputan dikirim.');


    }

    /**
     * Display the specified resource.
     */
    public function show(PenjemputanSampah $penjemputan)
    {
        if (Auth::user()->role !== 'admin' && $penjemputan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('penjemputan.show', compact('penjemputan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjemputanSampah $penjemputan)
    {
        if (Auth::user()->role !== 'admin' && $penjemputan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Hanya permintaan dengan status menunggu yang bisa diedit
        if ($penjemputan->status !== 'menunggu' && Auth::user()->role !== 'admin') {
            return redirect()->route('penjemputan.index')
                            ->with('error', 'Permintaan yang sudah diproses tidak dapat diedit.');
        }
        
        $jenisSampah = JenisSampah::all();
        return view('penjemputan.edit', compact('penjemputan', 'jenisSampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjemputanSampah $penjemputan)
    {
        if (Auth::user()->role !== 'admin' && $penjemputan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Jika user biasa, hanya bisa mengubah data permintaan
        if (Auth::user()->role === 'user') {
            // Hanya permintaan dengan status menunggu yang bisa diedit
            if ($penjemputan->status !== 'menunggu') {
                return redirect()->route('penjemputan.index')
                                ->with('error', 'Permintaan yang sudah diproses tidak dapat diedit.');
            }
            
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'kota' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'telepon' => 'required|string|max:20',
                'tanggal_penjemputan' => 'required|date|after_or_equal:today',
                'waktu_penjemputan' => 'required',
                'jenis_sampah' => 'required|string',
                'perkiraan_berat' => 'required|numeric|min:1',
                'catatan' => 'nullable|string',
            ]);
            
            $penjemputan->update($validated);
        } 
        // Jika admin, bisa mengubah status
        else {
            $validated = $request->validate([
                'status' => 'required|in:menunggu,diproses,selesai,dibatalkan',
            ]);
            
            $penjemputan->update($validated);
        }
        
        return redirect()->route('pages.jemput')
        ->with('success', 'Permintaan penjemputan sampah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjemputanSampah $penjemputan)
    {
        if (Auth::user()->role !== 'admin' && $penjemputan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Hanya permintaan dengan status menunggu yang bisa dihapus oleh user
        if (Auth::user()->role === 'user' && $penjemputan->status !== 'menunggu') {
            return redirect()->route('penjemputan.index')
                            ->with('error', 'Permintaan yang sudah diproses tidak dapat dihapus.');
        }
        
        $penjemputan->delete();
        
        return redirect()->route('pages.jemput')
                        ->with('success', 'Permintaan penjemputan sampah berhasil dihapus.');
    }
    
    /**
     * Update status permintaan penjemputan (khusus admin).
     */
    public function updateStatus(Request $request, PenjemputanSampah $penjemputan)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,dibatalkan',
        ]);

        // Update status permintaan
        $penjemputan->update($validated);

        // Muat relasi user agar bisa akses user-nya
        $penjemputan->load('user');

        // Jika status selesai, beri kontribusi dan poin
        if ($validated['status'] === 'selesai') {
            $emisi = $penjemputan->perkiraan_berat * $this->getFaktorEmisi($penjemputan->jenis_sampah);
            $points = floor($emisi * 10);

            // Buat kontribusi
            \App\Models\Kontribusi::create([
                'user_id' => $penjemputan->user_id,
                'jenis_sampah' => $penjemputan->jenis_sampah,
                'berat' => $penjemputan->perkiraan_berat,
                'emisi' => $emisi,
            ]);

            // Tambah poin ke user dan update level
            $user = $penjemputan->user;
            $user->increment('points', $points);
            $user->level = $this->getLevel($user->points); // <-- pakai 'points' di sini
            $user->save();
        }

        return redirect()->route('pages.jemput')
            ->with('success', 'Status permintaan penjemputan sampah berhasil diperbarui.');
    }

    
    private function getFaktorEmisi($jenis_sampah)
    {
        switch (strtolower($jenis_sampah)) {
            case 'Plastik':
                return 3.0; 
            case 'Kertas':
                return 2.5; 
            case 'Kaca':
                return 1.2; 
            case 'Logam':
                return 3.5; 
            case 'Organik':
                return 1.0; 
            default:
                return 1.0;
        }
    }


}