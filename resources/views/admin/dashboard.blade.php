@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient untuk seluruh halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">⚙️</span> Admin Dashboard
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    {{ __("Welcome Admin! Manage your platform efficiently.") }}
                </p>
            </div>

            {{-- Statistik singkat --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-blue-50 p-6 rounded-xl shadow-md border border-blue-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-5xl mb-3 text-blue-700">👥</span>
                    <h3 class="text-xl font-bold mb-2 text-blue-800">Total Users</h3>
                    <p class="text-4xl font-extrabold text-blue-900">{{ $totalUsers ?? '0' }}</p>
                </div>
                <div class="bg-green-50 p-6 rounded-xl shadow-md border border-green-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="400">
                    <span class="text-5xl mb-3 text-green-700">🚛</span>
                    <h3 class="text-xl font-bold mb-2 text-green-800">Total Penjemputan</h3>
                    <p class="text-4xl font-extrabold text-green-900">{{ $totalOrders ?? '0' }}</p>
                </div>
                <div class="bg-red-50 p-6 rounded-xl shadow-md border border-red-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="500">
                    <span class="text-5xl mb-3 text-red-700">⏳</span>
                    <h3 class="text-xl font-bold mb-2 text-red-800">Pending Approvals</h3>
                    <p class="text-4xl font-extrabold text-red-900">{{ $pendingApprovals ?? '0' }}</p>
                </div>
            </div>

            {{-- Daftar aktivitas terbaru --}}
            <div class="bg-gray-50 p-8 rounded-xl shadow-md border border-gray-200 mb-12 text-left" data-aos="fade-up" data-aos-delay="600">
                <h3 class="text-2xl font-extrabold text-green-800 mb-6 text-center">Recent Activities</h3>
                @if(isset($activities) && count($activities) > 0)
                    <ul class="space-y-4">
                        @foreach ($activities as $activity)
                            <li class="flex items-start text-gray-700 border-b border-gray-100 pb-3 last:border-b-0 last:pb-0" data-aos="fade-up" data-aos-delay="{{ 650 + ($loop->index * 50) }}">
                                <svg class="w-5 h-5 mt-1 mr-3 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 10.586V6z" clip-rule="evenodd"></path></svg>
                                <div>
                                    <p class="font-medium">{{ $activity->description }}</p>
                                    <small class="text-gray-500 italic">{{ $activity->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center p-4 text-gray-500 italic">
                        <p>No recent activities found.</p>
                    </div>
                @endif
            </div>

            {{-- Navigasi cepat --}}
            <div class="bg-gray-50 p-8 rounded-xl shadow-md border border-gray-200" data-aos="fade-up" data-aos-delay="900">
                <h3 class="text-2xl font-extrabold text-green-800 mb-6 text-center">Quick Links</h3>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('admin.users.index') }}"
                       class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="1000">
                        <span class="mr-2">🧑‍💻</span> Manage Users
                    </a>
                    <a href="{{ route('admin.products.index') }}"
                       class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="1100">
                        <span class="mr-2">📦</span> Manage Products
                    </a>
                    <a href="{{ route('admin.penjemputan.index') }}"
                       class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="1200">
                        <span class="mr-2">🚚</span> Manage Penjemputan
                    </a>
                </div>
            </div>

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-7xl --}}
</section>

{{-- AOS Initialization (Tambahkan ini jika belum ada di layouts/app.blade.php Anda) --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // Hanya animasi sekali saat elemen pertama kali terlihat
        mirror: false, // Elemen tidak akan menganimasikan ulang saat digulir melewati
        duration: 800, // Durasi animasi default
        easing: 'ease-out-back', // Easing default
    });
</script>
@endsection
