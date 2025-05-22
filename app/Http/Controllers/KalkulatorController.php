<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kontribusi;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('pages.kalkulator');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string',
            'berat' => 'required|numeric|min:0.01',
        ]);

        $jenis = strtolower($request->jenis);
        $berat = $request->berat;

        // Faktor Emisi CO2 per kg
        $faktor = [
            'kertas' => 0.46,
            'kaca' => 0.31,
            'plastik' => 1.08,
            'logam' => 8.14,
            'organik' => 0.12,
        ];

        // Validasi jenis
        if (!array_key_exists($jenis, $faktor)) {
            return back()->with('error', 'Jenis sampah tidak dikenali.');
        }

        $emisi = $berat * $faktor[$jenis];

        // Simpan kontribusi jika user login
        if (Auth::check()) {
            $user = Auth::user();

            Kontribusi::create([
                'user_id' => $user->id,
                'jenis_sampah' => $jenis,
                'berat' => $berat,
                'emisi' => $emisi,
            ]);

            // Tambahkan poin (misalnya: 1 poin = 0.1kg CO2 dihemat)
            $tambahPoin = floor($emisi * 10);
            $user->increment('poin', $tambahPoin);

            // Update level (opsional)
            $user->level = $this->getLevel($user->poin);
            $user->save();
        }

        return view('pages.hasil-kalkulator', [
            'jenis' => $jenis,
            'berat' => $berat,
            'kontribusi' => $emisi,
        ]);
    }

    private function getLevel($poin)
    {
        if ($poin >= 1000) return 'EcoLegend';
        if ($poin >= 500) return 'EcoHero';
        if ($poin >= 100) return 'EcoWarrior';
        return 'EcoNewbie';
    }
}
