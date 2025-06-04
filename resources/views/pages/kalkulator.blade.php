@extends('layouts.app')

@section('content')
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-xl mx-auto px-4 md:px-6 w-full">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200 text-center" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">
            <div class="mb-6">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">♻️</span> Kalkulator Kontribusi Lingkungan
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Hitung dampak positif Anda terhadap bumi!
                </p>
            </div>

            <form action="{{ route('pages.kalkulator.hitung') }}" method="POST" class="space-y-6">
                @csrf

                <div data-aos="fade-right" data-aos-delay="300">
                    <label for="jenis" class="block mb-2 text-lg font-semibold text-gray-700 text-left">
                        Pilih Jenis Sampah Anda
                    </label>
                    <div class="relative">
                        <select name="jenis" id="jenis" class="w-full border border-gray-300 rounded-lg p-3 text-lg text-gray-800 focus:ring-green-500 focus:border-green-500 transition-all duration-200 pr-10
                            appearance-none /* This hides default arrow for most browsers */
                            webkit-appearance-none /* For Webkit browsers (Chrome, Safari) */
                            moz-appearance-none /* For Firefox */
                        ">
                            <option value="plastik">Plastik</option>
                            <option value="kertas">Kertas</option>
                            <option value="kaca">Kaca</option>
                            <option value="logam">Logam</option>
                            <option value="organik">Organik</option>
                        </select>
                        {{-- Custom arrow for select --}}
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-delay="400">
                    <label for="berat" class="block mb-2 text-lg font-semibold text-gray-700 text-left">
                        Masukkan Berat Sampah (dalam kg)
                    </label>
                    <input type="number" step="0.01" name="berat" id="berat" placeholder="Contoh: 2.5" class="w-full border border-gray-300 rounded-lg p-3 text-lg text-gray-800 focus:ring-green-500 focus:border-green-500 transition-all duration-200" required>
                </div>

                <button type="submit" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-green-600 hover:bg-green-700 transform transition duration-300 ease-in-out hover:scale-105" data-aos="zoom-in" data-aos-delay="500">
                    Hitung Kontribusi Saya <span class="ml-2">✨</span>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection