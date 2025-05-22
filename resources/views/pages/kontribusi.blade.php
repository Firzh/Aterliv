@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Riwayat Kontribusi Anda</h1>

    <p class="mb-4 text-green-700 font-semibold">
        Total Emisi CO₂ yang Telah Dikurangi: {{ number_format($totalEmisi, 2) }} kg
    </p>

    {{-- Grafik --}}
    <div class="mb-6">
        <canvas id="grafikKontribusi" width="400" height="200"></canvas>
    </div>

    {{-- Riwayat --}}
    <h2 class="text-lg font-bold mb-2">Riwayat Kontribusi</h2>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Jenis Sampah</th>
                <th class="p-2 border">Berat (kg)</th>
                <th class="p-2 border">Emisi CO₂ (kg)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kontribusis as $item)
                <tr>
                    <td class="p-2 border">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="p-2 border">{{ ucfirst($item->jenis_sampah) }}</td>
                    <td class="p-2 border">{{ $item->berat }}</td>
                    <td class="p-2 border">{{ number_format($item->emisi, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">Belum ada kontribusi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikKontribusi').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($grafikLabels) !!},
            datasets: [{
                label: 'Emisi CO₂ Berkurang (kg)',
                data: {!! json_encode($grafikValues) !!},
                backgroundColor: '#16a34a',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
