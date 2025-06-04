<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kontribusi;
use App\Models\User;

class KontribusiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kontribusi = $user->kontribusi()->latest()->get();
        $totalEmisi = $kontribusi->sum('emisi');

        $grafikData = $kontribusi->groupBy('jenis_sampah')->map(function ($group) {
            return $group->sum('emisi');
        });

        // Data statistik untuk bagian bawah halaman
        $totalBerat = $kontribusi->sum('berat');
        $totalEnergi = $totalBerat * 3; // asumsi 1kg = 3kWh
        $totalUserKontribusi = Kontribusi::distinct('user_id')->count();

        return view('pages.kontribusi', [
            'kontribusis' => $kontribusi,
            'totalEmisi' => $totalEmisi,
            'grafikLabels' => $grafikData->keys(),
            'grafikValues' => $grafikData->values(),
            // Data statistik tambahan
            'totalBerat' => $totalBerat,
            'totalEnergi' => $totalEnergi,
            'totalUser' => $totalUserKontribusi,
        ]);
    }

    public function statistik()
    {
        $totalBerat = Kontribusi::sum('berat');
        $totalEmisi = Kontribusi::sum('emisi');
        $totalUser = User::count();
        $totalEnergi = $totalBerat * 3; // asumsi 1kg = 3kWh

        return view('pages.statistik', compact('totalBerat', 'totalEmisi', 'totalUser', 'totalEnergi'));
    }
}