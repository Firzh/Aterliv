<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reward;
use App\Models\PenukaranPoin;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('pages.reward', compact('rewards'));
    }

    public function tukar(Request $request, Reward $reward)
    {
        $user = Auth::user();

        if ($user->poin < $reward->poin_diperlukan) {
            return back()->with('error', 'Poin Anda tidak mencukupi.');
        }

        // Kurangi poin user
        $user->decrement('poin', $reward->poin_diperlukan);

        // Simpan penukaran
        PenukaranPoin::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id
        ]);

        return back()->with('success', 'Reward berhasil ditukar.');
    }

    public function riwayat()
    {
        $riwayats = Auth::user()->penukarans()->with('reward')->latest()->get();
        return view('pages.penukaran', compact('riwayats'));
    }
}
