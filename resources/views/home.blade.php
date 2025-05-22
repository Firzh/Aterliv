@extends('layouts.app')

@section('content')
<div class="w-full mx-auto bg-white p-6 text-center">
        
    @if (Auth::check())
        <h1 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}</h1>
        <p class="text-gray-600 mt-2">
            Level Anda: {{ Auth::user()->level }} | Poin: {{ Auth::user()->poin }}
        </p>

        <div class="mt-6 flex flex-wrap justify-center gap-4">
            <a href="{{ route('pages.kalkulator') }}" 
            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
            🧮 Hitung Emisi
            </a>
            
            <a href="{{ route('pages.kontribusi') }}" 
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
            📈 Kontribusi Saya
            </a>
            
            <a href="{{ route('reward.index') }}" 
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow">
            🎁 Tukar Reward
            </a>
            
            <a href="{{ route('pages.jemput') }}" 
            class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded shadow">
            🚛 Penjemputan Sampah
            </a>
        </div>
            <!-- Artikel-artikel -->
        <div class="mt-10 ">
            <h2 class="text-xl font-bold mb-4 text-left">Artikel Terbaru</h2>
            <div class="grid md:grid-cols-3 gap-6 text-left">
                <!-- Artikel 1 -->
                <div class="bg-gray-100 p-4 rounded shadow">
                    <h3 class="font-semibold text-lg mb-2">Cara Mengurangi Emisi Karbon dari Rumah Tangga</h3>
                    <p class="text-sm text-gray-700">Pelajari langkah-langkah mudah untuk mengurangi jejak karbon dari aktivitas harian di rumah.</p>
                    <a href="#" class="text-blue-500 hover:underline text-sm">Baca selengkapnya</a>
                </div>
                
                <!-- Artikel 2 -->
                <div class="bg-gray-100 p-4 rounded shadow">
                    <h3 class="font-semibold text-lg mb-2">Manfaat Daur Ulang untuk Lingkungan</h3>
                    <p class="text-sm text-gray-700">Daur ulang tidak hanya mengurangi limbah, tapi juga membantu pelestarian lingkungan kita.</p>
                    <a href="#" class="text-blue-500 hover:underline text-sm">Baca selengkapnya</a>
                </div>
                
                <!-- Artikel 3 -->
                <div class="bg-gray-100 p-4 rounded shadow">
                    <h3 class="font-semibold text-lg mb-2">Jenis Sampah dan Cara Pemilahannya</h3>
                    <p class="text-sm text-gray-700">Kenali perbedaan antara sampah organik, anorganik, dan B3 untuk pemilahan yang tepat.</p>
                    <a href="#" class="text-blue-500 hover:underline text-sm">Baca selengkapnya</a>
                </div>
            </div>
        </div>
    @else
        <p class="text-red-600">Anda belum login. <a href="{{ route('login') }}" class="underline">Login di sini</a>.</p>
    @endif

</div>
@endsection
