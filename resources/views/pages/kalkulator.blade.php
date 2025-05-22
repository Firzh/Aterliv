@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-6 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Kalkulator Sampah</h1>

    <form action="{{ route('pages.hitung') }}" method="POST">
        @csrf

        <label for="jenis" class="block mb-2 font-semibold">Jenis Sampah</label>
        <select name="jenis" id="jenis" class="w-full border rounded p-2 mb-4">
            <option value="plastik">Plastik</option>
            <option value="kertas">Kertas</option>
            <option value="kaca">Kaca</option>
            <option value="logam">Logam</option>
            <option value="organik">Organik</option>
        </select>

        <label for="berat" class="block mb-2 font-semibold">Berat (kg)</label>
        <input type="number" step="0.01" name="berat" id="berat" class="w-full border rounded p-2 mb-4" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Hitung Kontribusi</button>
        
    </form>
</div>
@endsection
