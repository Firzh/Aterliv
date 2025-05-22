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
        $kontribusis = $user->kontribusis()->latest()->get();
        $totalEmisi = $kontribusis->sum('emisi');

        $grafikData = $kontribusis->groupBy('jenis_sampah')->map(function ($group) {
            return $group->sum('emisi');
        });

        return view('pages.kontribusi', [
            'kontribusis' => $kontribusis,
            'totalEmisi' => $totalEmisi,
            'grafikLabels' => $grafikData->keys(),
            'grafikValues' => $grafikData->values(),
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
