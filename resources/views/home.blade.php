@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200 text-center" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            @if (Auth::check())
                {{-- Welcome and User Info --}}
                <div class="mb-10">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                        Halo, {{ Auth::user()->name }}!
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                        Level Anda: <span class="font-semibold text-blue-700">{{ Auth::user()->getLevel() }}</span> | Poin: <span class="font-semibold text-yellow-700">{{ Auth::user()->points }} ⭐</span>
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-6 flex flex-wrap justify-center gap-6">
                    <a href="{{ route('pages.kalkulator.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="300">
                        <span class="mr-2">🧮</span> Hitung Emisi
                    </a>

                    <a href="{{ route('pages.kontribusi') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="400">
                        <span class="mr-2">📈</span> Kontribusi Saya
                    </a>

                    <a href="{{ route('reward.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="500">
                        <span class="mr-2">🎁</span> Tukar Reward
                    </a>

                    <a href="{{ route('pages.jemput.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105"
                       data-aos="zoom-in" data-aos-delay="600">
                        <span class="mr-2">🚛</span> Penjemputan Sampah
                    </a>
                </div>

                {{-- Ringkasan Kontribusi Anda --}}
                <div class="mt-16 text-left">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-green-800 mb-8 text-center" data-aos="fade-up" data-aos-delay="700">Ringkasan Kontribusi Anda</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card 1: Total CO2 Reduced -->
                        <div class="bg-blue-50 p-6 rounded-xl shadow-md border border-blue-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="800">
                            <span class="text-5xl mb-3">🌿</span>
                            <p class="text-lg font-semibold text-blue-800">CO2 Berkurang</p>
                            <p class="text-4xl font-extrabold text-blue-900 mt-2">
                                {{-- Replace '8.44' with Auth::user()->total_co2_reduced if available --}}
                                {{ Auth::user()->total_co2_reduced ?? '8.44' }} kg
                            </p>
                        </div>
                        <!-- Card 2: Total Waste Recycled -->
                        <div class="bg-green-50 p-6 rounded-xl shadow-md border border-green-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="900">
                            <span class="text-5xl mb-3">♻️</span>
                            <p class="text-lg font-semibold text-green-800">Sampah Didaur Ulang</p>
                            <p class="text-4xl font-extrabold text-green-900 mt-2">
                                {{-- Replace '15.00' with Auth::user()->total_waste_recycled if available --}}
                                {{ Auth::user()->total_waste_recycled ?? '15.00' }} kg
                            </p>
                        </div>
                        <!-- Card 3: Total Pickups -->
                        <div class="bg-yellow-50 p-6 rounded-xl shadow-md border border-yellow-200 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="1000">
                            <span class="text-5xl mb-3">📦</span>
                            <p class="text-lg font-semibold text-yellow-800">Jumlah Penjemputan</p>
                            <p class="text-4xl font-extrabold text-yellow-900 mt-2">
                                {{-- Replace '8' with Auth::user()->total_pickups if available --}}
                                {{ Auth::user()->total_pickups ?? '8' }} kali
                            </p>
                        </div>
                    </div>
                </div>

                {{-- New Section: Tips Lingkungan --}}
                <div class="mt-16 text-left">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-green-800 mb-8 text-center" data-aos="fade-up" data-aos-delay="1100">Tips Lingkungan Hari Ini</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Tip 1 -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1200">
                            <span class="text-3xl flex-shrink-0">💡</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Kurangi Penggunaan Plastik Sekali Pakai</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Bawa tas belanja sendiri, gunakan botol minum isi ulang, dan hindari sedotan plastik.</p>
                            </div>
                        </div>

                        <!-- Tip 2 -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1300">
                            <span class="text-3xl flex-shrink-0">💧</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Hemat Air di Rumah</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Perbaiki keran yang bocor, mandi lebih singkat, dan gunakan air bekas cucian untuk menyiram tanaman.</p>
                            </div>
                        </div>

                        <!-- Tip 3 -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1400">
                            <span class="text-3xl flex-shrink-0">🔌</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Cabut Kabel Elektronik yang Tidak Digunakan</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Mencabut charger atau alat elektronik saat tidak dipakai dapat menghemat energi secara signifikan.</p>
                            </div>
                        </div>

                        <!-- Tip 4 (Optional, if you want more tips) -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1500">
                            <span class="text-3xl flex-shrink-0">🥦</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Kompos Sampah Organik Anda</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Ubah sisa makanan dan limbah kebun menjadi pupuk alami yang kaya nutrisi untuk tanaman Anda.</p>
                            </div>
                        </div>

                        <!-- Tip 5 (Optional) -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1600">
                            <span class="text-3xl flex-shrink-0">🚲</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Gunakan Transportasi Ramah Lingkungan</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Pertimbangkan berjalan kaki, bersepeda, atau menggunakan transportasi umum untuk mengurangi emisi.</p>
                            </div>
                        </div>

                        <!-- Tip 6 (Optional) -->
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1700">
                            <span class="text-3xl flex-shrink-0">🌳</span>
                            <div>
                                <h3 class="font-bold text-xl text-gray-800 mb-2">Tanam Pohon atau Ikut Penghijauan</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Setiap pohon yang ditanam berkontribusi besar dalam menyerap karbon dioksida dan mempercantik lingkungan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Not Logged In Message --}}
                <div class="bg-red-100 text-red-800 p-6 rounded-lg shadow-md flex flex-col items-center justify-center" data-aos="zoom-in" data-aos-delay="100">
                    <svg class="w-12 h-12 mb-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10a6 6 0 11-12 0 6 6 0 0112 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v4m0 0h-2m2 0h2"></path></svg>
                    <p class="text-xl font-semibold mb-3">Anda belum login.</p>
                    <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-full shadow-md transition transform hover:scale-105">
                        Login di sini
                    </a>
                </div>
            @endif

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-6xl --}}
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
