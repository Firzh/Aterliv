@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient untuk seluruh halaman --}}
<section class="bg-gradient-to-br from-green-100 to-blue-100 min-h-screen py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200 text-center" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section Komunitas --}}
            <div class="mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">🤝</span> Komunitas Återliv
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Bergabunglah dengan gerakan kami dan buat dampak nyata bagi lingkungan!
                </p>
            </div>

            {{-- Ringkasan Komunitas (Opsional: data statistik) --}}
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                <div class="bg-blue-50 p-6 rounded-xl shadow-md border border-blue-200" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-5xl mb-3 block">👥</span>
                    <p class="text-lg font-semibold text-blue-800">Anggota Aktif</p>
                    <p class="text-4xl font-extrabold text-blue-900 mt-2">
                        {{-- Replace with actual data, e.g., {{ $activeMembers }} --}}
                        1,200+
                    </p>
                </div>
                <div class="bg-green-50 p-6 rounded-xl shadow-md border border-green-200" data-aos="fade-up" data-aos-delay="400">
                    <span class="text-5xl mb-3 block">🌍</span>
                    <p class="text-lg font-semibold text-green-800">Acara Terselenggara</p>
                    <p class="text-4xl font-extrabold text-green-900 mt-2">
                        {{-- Replace with actual data, e.g., {{ $eventsHeld }} --}}
                        50+
                    </p>
                </div>
                <div class="bg-yellow-50 p-6 rounded-xl shadow-md border border-yellow-200" data-aos="fade-up" data-aos-delay="500">
                    <span class="text-5xl mb-3 block">🌱</span>
                    <p class="text-lg font-semibold text-yellow-800">Pohon Ditanam</p>
                    <p class="text-4xl font-extrabold text-yellow-900 mt-2">
                        {{-- Replace with actual data, e.g., {{ $treesPlanted }} --}}
                        2,500+
                    </p>
                </div>
            </div>

            {{-- Bagian Aktivitas Komunitas --}}
            <div class="mt-16 text-left">
                <h2 class="text-2xl md:text-3xl font-extrabold text-green-800 mb-8 text-center" data-aos="fade-up" data-aos-delay="600">Aktivitas Komunitas Terbaru</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Aktivitas 1 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col" data-aos="fade-up" data-aos-delay="700">
                        <img src="https://placehold.co/600x300/e0f2f7/0284c7?text=Aksi+Bersih-Bersih+Pantai" alt="Aksi Bersih-Bersih Pantai" class="rounded-lg mb-4 w-full h-48 object-cover">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Aksi Bersih-Bersih Pantai</h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3 flex-grow">Bergabunglah dengan kami dalam membersihkan pantai dari sampah plastik dan menjaga ekosistem laut.</p>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>15 Juli 2025</span>
                            <svg class="w-4 h-4 ml-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Pantai Indah, Bali</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm inline-flex items-center transition-colors duration-200">
                            Lihat Detail Acara
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    <!-- Aktivitas 2 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col" data-aos="fade-up" data-aos-delay="800">
                        <img src="https://placehold.co/600x300/d1e7dd/0f5132?text=Workshop+Daur+Ulang+Kreatif" alt="Workshop Daur Ulang Kreatif" class="rounded-lg mb-4 w-full h-48 object-cover">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Workshop Daur Ulang Kreatif</h3>
                        <p class="text-sm text-gray-70-leading-relaxed mb-3 flex-grow">Belajar cara mengubah barang bekas menjadi kerajinan tangan yang bernilai dan ramah lingkungan.</p>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>20 Agustus 2025</span>
                            <svg class="w-4 h-4 ml-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Pusat Komunitas Hijau, Jakarta</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm inline-flex items-center transition-colors duration-200">
                            Lihat Detail Acara
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="900">
                    <a href="#" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition transform hover:scale-105">
                        Lihat Semua Aktivitas →
                    </a>
                </div>
            </div>

            {{-- Testimoni Anggota (Opsional) --}}
            <div class="mt-16 text-left">
                <h2 class="text-2xl md:text-3xl font-extrabold text-green-800 mb-8 text-center" data-aos="fade-up" data-aos-delay="1000">Apa Kata Anggota Kami?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimoni 1 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1100">
                        <img src="https://placehold.co/60x60/a0aec0/ffffff?text=JD" alt="Foto Profil John Doe" class="w-16 h-16 rounded-full object-cover flex-shrink-0 border-2 border-green-400">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">John Doe</p>
                            <p class="text-sm text-gray-600 mb-3">Anggota Sejak 2023</p>
                            <p class="text-gray-700 italic leading-relaxed">"Bergabung dengan Återliv sangat mengubah pandangan saya tentang daur ulang. Mudah, menyenangkan, dan saya merasa benar-benar berkontribusi!"</p>
                        </div>
                    </div>
                    <!-- Testimoni 2 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-md flex items-start space-x-4" data-aos="fade-up" data-aos-delay="1200">
                        <img src="https://placehold.co/60x60/a0aec0/ffffff?text=AS" alt="Foto Profil Alice Smith" class="w-16 h-16 rounded-full object-cover flex-shrink-0 border-2 border-blue-400">
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Alice Smith</p>
                            <p class="text-sm text-gray-600 mb-3">Anggota Sejak 2024</p>
                            <p class="text-gray-700 italic leading-relaxed">"Saya suka fitur penjemputan sampah dan rewardnya! Ini membuat saya lebih termotivasi untuk menjaga lingkungan."</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Call to Action untuk Bergabung --}}
            <div class="mt-16 text-center bg-gradient-to-r from-emerald-600 to-blue-600 text-white p-10 rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="1300">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-6 leading-tight">Siap Bergabung dengan Komunitas Kami?</h2>
                <p class="text-lg mb-8 max-w-2xl mx-auto">Mari bersama-sama menciptakan masa depan yang lebih hijau. Daftarkan diri Anda sekarang dan mulai perjalanan kontribusi lingkungan Anda!</p>
                <a href="#" class="inline-block bg-white text-emerald-700 font-semibold px-10 py-4 rounded-full shadow-lg transition transform hover:scale-105 hover:bg-gray-100 hover:text-emerald-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                    Daftar Sekarang →
                </a>
            </div>

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-6xl --}}
</section>

{{-- AOS Initialization --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        mirror: false,
        duration: 800,
        easing: 'ease-out-back',
    });
</script>
@endsection
