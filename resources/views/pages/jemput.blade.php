@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">🚚</span> Permintaan Penjemputan Sampah
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Kelola semua permintaan penjemputan sampah Anda di sini.
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

            {{-- Button to create new request --}}
            <div class="mb-8 text-center" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('pages.jemput.create') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Buat Permintaan Baru
                </a>
            </div>

            @if($penjemputan->isEmpty())
                <div class="text-center p-8 text-gray-500 italic" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-lg mb-2">Belum ada permintaan penjemputan yang tercatat.</p>
                    <p>Ayo buat permintaan pertama Anda sekarang!</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200" data-aos="fade-up" data-aos-delay="400">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider rounded-tl-lg">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Waktu</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Jenis Sampah</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Perkiraan Berat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider rounded-tr-lg">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($penjemputan as $index => $item)
                                <tr class="hover:bg-gray-50 transition-colors duration-200" data-aos="fade-up" data-aos-delay="{{ 450 + ($index * 50) }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->tanggal_penjemputan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->waktu_penjemputan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ ucfirst($item->jenis_sampah) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->perkiraan_berat }} kg</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($item->status === 'menunggu') bg-yellow-100 text-yellow-800
                                            @elseif($item->status === 'diproses') bg-blue-100 text-blue-800
                                            @elseif($item->status === 'selesai') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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