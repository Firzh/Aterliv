<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\LokasiDaurUlang;

class HomeController extends Controller
{
    public function index()
    {
        $jenisSampah = JenisSampah::all();
        $lokasi = LokasiDaurUlang::take(3)->get();
        
        return view('home', compact('jenisSampah', 'lokasi'));
    }
}