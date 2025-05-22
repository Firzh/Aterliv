@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Jenis Sampah</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($jenisSampah as $item)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">{{ $item->nama }}</h2>
                <p class="text-gray-600">{{ Str::limit($item->deskripsi, 100) }}</p>
                <a href="{{ route('sampah.show', $item->id) }}" class="text-green-600 text-sm mt-2 inline-block">Lihat Detail</a>
            </div>
        @endforeach
    </div>
@endsection
