@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-6 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Hasil Perhitungan</h1>

    <p><strong>Jenis Sampah:</strong> {{ ucfirst($jenis) }}</p>
    <p><strong>Berat:</strong> {{ $berat }} kg</p>
    <p><strong>Estimasi Kontribusi Lingkungan:</strong> {{ number_format($kontribusi, 2) }} poin</p>
    @if (Auth::check())
    <p class="mt-2 text-sm text-green-700">Terima kasih! Anda telah menyumbang pengurangan CO₂ dan mendapatkan poin.</p>
    @endif

    <a href="{{ route('pages.kalkulator') }}" class="mt-4 inline-block text-green-600">← Kembali</a>
</div>
@endsection
