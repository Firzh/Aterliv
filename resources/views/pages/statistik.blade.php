@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6  mt-6">
    <h1 class="text-2xl font-bold text-center mb-4">📊 Statistik Lingkungan</h1>
    <p class="text-center text-gray-600 mb-6">Statistik kontribusi komunitas EcoLearn</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-green-50 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">🌱 Total Sampah Didaur Ulang</h2>
            <p class="text-2xl font-bold text-green-700">{{ number_format($totalBerat, 2) }} kg</p>
        </div>
        
        <div class="p-4 bg-blue-50 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">⚡ Energi Dihindari</h2>
            <p class="text-2xl font-bold text-blue-700">{{ number_format($totalEnergi, 2) }} kWh</p>
        </div>

        <div class="p-4 bg-yellow-50 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">💨 Emisi CO₂ Berkurang</h2>
            <p class="text-2xl font-bold text-yellow-700">{{ number_format($totalEmisi, 2) }} kg CO₂</p>
        </div>

        <div class="p-4 bg-purple-50 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-2">👥 Jumlah Pengguna Aktif</h2>
            <p class="text-2xl font-bold text-purple-700">{{ $totalUser }} pengguna</p>
        </div>
    </div>
</div>
@endsection
