@extends('layouts.app')

@section('content')
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up">

            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up">
                    📋 Daftar Permintaan Penjemputan
                </h1>
                <p class="text-lg text-gray-600">Kelola pemesanan penjemputan dari pengguna.</p>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Telepon</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Waktu</th>
                            <th class="px-4 py-2 text-left">Jenis Sampah</th>
                            <th class="px-4 py-2 text-left">Berat (kg)</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penjemputan as $item)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2">{{ $item->nama }}</td>
                                <td class="px-4 py-2">{{ $item->telepon }}</td>
                                <td class="px-4 py-2">{{ $item->tanggal_penjemputan }}</td>
                                <td class="px-4 py-2">{{ $item->waktu_penjemputan }}</td>
                                <td class="px-4 py-2">{{ $item->jenis_sampah }}</td>
                                <td class="px-4 py-2">{{ $item->perkiraan_berat }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-medium
                                        @if($item->status === 'menunggu') bg-yellow-100 text-yellow-800
                                        @elseif($item->status === 'diproses') bg-blue-100 text-blue-800
                                        @elseif($item->status === 'selesai') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    @if($item->status === 'menunggu')
                                        <form action="{{ route('penjemputan.updateStatus', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="diproses">
                                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs">Approve</button>
                                        </form>

                                        <form action="{{ route('penjemputan.updateStatus', $item->id) }}" method="POST" class="inline ml-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="dibatalkan">
                                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">Decline</button>
                                        </form>
                                    @else
                                        <span class="text-gray-500 text-xs italic">Tidak tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-gray-500 px-4 py-6">Belum ada permintaan penjemputan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- AOS library --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>AOS.init({ once: true });</script>
@endsection
