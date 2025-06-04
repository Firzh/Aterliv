@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">💰</span> Tukar Poin dengan Reward
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Pilih reward impianmu dan tukarkan dengan poin yang telah kamu kumpulkan!
                </p>
            </div>

            {{-- Flash Messages (Success/Error) --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="250">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="250">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-semibold">{{ session('error') }}</p>
                </div>
            @endif

            {{-- User Points Display --}}
            <div class="p-6 bg-blue-50 rounded-lg shadow-md border border-blue-200 mb-10 text-center" data-aos="zoom-in" data-aos-delay="300">
                <p class="text-xl md:text-2xl text-blue-700 font-semibold mb-2">
                    Poin Anda Saat Ini:
                </p>
                <p class="text-5xl md:text-6xl font-extrabold text-blue-800 leading-none flex items-center justify-center">
                    <span class="mr-3">⭐</span> {{ Auth::user()->poin }}
                </p>
                <p class="text-sm text-gray-600 mt-2 italic">
                    Kumpulkan lebih banyak poin dengan kontribusi lingkungan!
                </p>
            </div>

            {{-- Rewards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($rewards as $index => $item)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden relative group" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 100) }}">
                        @if ($item->image_url ?? false) {{-- Asumsi ada kolom image_url untuk gambar reward --}}
                            <div class="h-48 w-full object-cover overflow-hidden">
                                <img src="{{ $item->image_url }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            {{-- Placeholder jika tidak ada gambar, bisa diganti dengan ikon default atau gambar umum --}}
                            <div class="h-48 w-full bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $item->nama }}</h2>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-3">{{ $item->deskripsi }}</p>
                            <p class="text-lg font-bold text-blue-700 mb-4 flex items-center">
                                <span class="mr-2">✨</span> Poin: {{ $item->poin_diperlukan }}
                            </p>

                            <form action="{{ route('reward.tukar', $item->id) }}" method="POST">
                                @csrf
                                @php
                                    $canRedeem = Auth::user()->poin >= $item->poin_diperlukan;
                                @endphp
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-6 py-2 rounded-full font-semibold shadow-md
                                                {{ $canRedeem ? 'bg-gradient-to-r from-green-600 to-blue-600 text-white hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105' : 'bg-gray-400 text-gray-700 cursor-not-allowed' }}"
                                    {{ $canRedeem ? '' : 'disabled' }}>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    {{ $canRedeem ? 'Tukar Sekarang' : 'Poin Tidak Cukup' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-8 text-gray-500 italic" data-aos="fade-up" data-aos-delay="400">
                        <p class="text-lg mb-2">Tidak ada reward yang tersedia saat ini.</p>
                        <p>Ayo terus berkontribusi dan kumpulkan poin!</p>
                    </div>
                @endforelse
            </div>

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-4xl --}}
</section>

{{-- AOS Initialization (Tambahkan ini jika belum ada di layouts/app.blade.php Anda) --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // Hanya animasi sekali saat elemen pertama kali terlihat
        mirror: false, // Elemen tidak akan menganimasikan ulang saat digulir melewati
    });
</script>
@endsection
