@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Lokasi Daur Ulang</h1>

    <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4">
        <select name="kota" class="border border-gray-300 rounded p-2 w-full md:w-1/3">
            <option value="">Semua Kota</option>
            @foreach ($kota as $k)
                <option value="{{ $k }}" {{ request('kota') === $k ? 'selected' : '' }}>{{ $k }}</option>
            @endforeach
        </select>
        <input type="text" name="jenis_sampah" class="border border-gray-300 rounded p-2 w-full md:w-1/3"
               placeholder="Cari jenis sampah..." value="{{ request('jenis_sampah') }}">
        <button class="bg-green-600 text-white px-4 py-2 rounded">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($lokasi as $item)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-bold">{{ $item->nama }}</h2>
                <p class="text-gray-600">{{ $item->alamat }}, {{ $item->kecamatan }}, {{ $item->kota }}</p>
                <p class="text-sm text-gray-500 mt-2">Jenis diterima: {{ $item->jenis_sampah_diterima }}</p>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada lokasi ditemukan.</p>
        @endforelse
    </div>
@endsection