@extends('layouts.app')

@section('content')
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-3xl mx-auto px-4 md:px-6 w-full">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">📝</span> Buat Permintaan Penjemputan
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Isi formulir di bawah untuk menjadwalkan penjemputan sampah Anda.
                </p>
            </div>

            {{-- Error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="250">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="font-semibold">Terjadi kesalahan:</p>
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('pages.jemput.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nama --}}
                <div data-aos="fade-right" data-aos-delay="300">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ Auth::user()->name }}" class="w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" readonly>
                </div>

                {{-- Telepon --}}
                <div data-aos="fade-left" data-aos-delay="350">
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                {{-- Tanggal & Waktu --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div data-aos="fade-right" data-aos-delay="400">
                        <label for="tanggal_penjemputan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Penjemputan</label>
                        <input type="date" name="tanggal_penjemputan" id="tanggal_penjemputan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="450">
                        <label for="waktu_penjemputan" class="block text-sm font-medium text-gray-700 mb-1">Waktu Penjemputan</label>
                        <input type="time" name="waktu_penjemputan" id="waktu_penjemputan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>

                {{-- Alamat --}}
                <div data-aos="fade-up" data-aos-delay="500">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                {{-- Kota & Kecamatan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div data-aos="fade-right" data-aos-delay="550">
                        <label for="kota" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                        <input type="text" name="kota" id="kota" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="600">
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>

                {{-- Jenis Sampah --}}
                <div data-aos="fade-up" data-aos-delay="650">
                    <label for="jenis_sampah" class="block text-sm font-medium text-gray-700 mb-1">Jenis Sampah</label>
                    <select name="jenis_sampah" id="jenis_sampah" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white" required>
                        <option value="" disabled selected>Pilih Jenis Sampah</option>
                        @foreach ($jenisSampah as $js)
                            <option value="{{ $js->nama }}">{{ $js->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Berat --}}
                <div data-aos="fade-up" data-aos-delay="700">
                    <label for="perkiraan_berat" class="block text-sm font-medium text-gray-700 mb-1">Perkiraan Berat (kg)</label>
                    <input type="number" name="perkiraan_berat" id="perkiraan_berat" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                {{-- Catatan --}}
                <div data-aos="fade-up" data-aos-delay="750">
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan (opsional)</label>
                    <textarea name="catatan" id="catatan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                </div>

                {{-- Peta --}}
                <div class="mb-6" data-aos="fade-up" data-aos-delay="800">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lokasi pada Peta</label>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="display_latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="text" id="display_latitude" class="w-full px-3 py-2 border border-gray-200 bg-gray-100 rounded-md" readonly>
                        </div>
                        <div>
                            <label for="display_longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="text" id="display_longitude" class="w-full px-3 py-2 border border-gray-200 bg-gray-100 rounded-md" readonly>
                        </div>
                    </div>

                    <div class="border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                        @include('partials.main-map')
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mt-8 text-center" data-aos="zoom-in" data-aos-delay="850">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-8 py-3 text-base font-medium rounded-full text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12A9 9 0 113 12a9 9 0 0118 0z"/>
                        </svg>
                        Kirim Permintaan Penjemputan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- AOS Library --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ once: true, mirror: false, duration: 800, easing: 'ease-out-back' });
</script>
@endsection
