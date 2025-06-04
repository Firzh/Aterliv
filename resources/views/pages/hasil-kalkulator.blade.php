@extends('layouts.app')

@section('content')
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-xl mx-auto px-4 md:px-6 w-full">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200 text-center" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">
            <div class="mb-6">
                {{-- Dynamic Icon based on environmental impact/success --}}
                <svg class="w-20 h-20 text-green-500 mx-auto mb-4 animate-bounce-in" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    Hasil Perhitungan Dampak Lingkungan
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Terima kasih atas kontribusi Anda!
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 text-left">
                <div class="p-4 bg-green-50 rounded-lg border border-green-200" data-aos="fade-right" data-aos-delay="300">
                    <p class="text-sm text-green-700 font-semibold mb-1">Jenis Sampah:</p>
                    <p class="text-xl font-bold text-green-800">{{ ucfirst($jenis) }}</p>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg border border-blue-200" data-aos="fade-left" data-aos-delay="400">
                    <p class="text-sm text-blue-700 font-semibold mb-1">Berat Sampah:</p>
                    <p class="text-xl font-bold text-blue-800">{{ $berat }} kg</p>
                </div>
            </div>

            <div class="p-6 bg-yellow-50 rounded-lg border border-yellow-200 mb-8" data-aos="zoom-in" data-aos-delay="500">
                <p class="text-lg text-yellow-800 font-semibold mb-2">Estimasi Pengurangan Emisi CO₂:</p>
                <p class="text-4xl md:text-5xl font-extrabold text-yellow-700 leading-none">
                    {{ number_format($kontribusi, 2) }} <span class="text-2xl">kg CO₂ eq</span>
                </p>
                <p class="text-sm text-gray-600 mt-2 italic">
                    (Jumlah ini adalah estimasi kontribusi Anda dalam mengurangi jejak karbon.)
                </p>
            </div>

            @if (Auth::check())
            <div class="bg-green-100 p-4 rounded-lg shadow-inner mb-8" data-aos="fade-up" data-aos-delay="600">
                <p class="text-base text-green-800 font-medium flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    Poin Anda telah ditambahkan! Terima kasih telah berkontribusi!
                </p>
            </div>
            @else
            <div class="bg-blue-100 p-4 rounded-lg shadow-inner mb-8" data-aos="fade-up" data-aos-delay="600">
                <p class="text-base text-blue-800 font-medium">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Login</a> untuk menyimpan kontribusi dan mendapatkan poin!
                </p>
            </div>
            @endif

            <a href="{{ route('pages.kalkulator.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-md text-white bg-green-600 hover:bg-green-700 transform transition duration-300 ease-in-out hover:scale-105" data-aos="zoom-in" data-aos-delay="700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Kalkulator
            </a>
        </div>
    </div>
</section>

<style>
    /* Custom animation for the checkmark icon */
    @keyframes bounce-in {
        0%, 20%, 40%, 60%, 80%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .animate-bounce-in {
        animation: bounce-in 1s ease-out;
    }
</style>
@endsection