@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-3xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">✏️</span> Edit Produk
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Perbarui detail produk ini di daftar reward.
                </p>
            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="250">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
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

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nama Produk --}}
                <div data-aos="fade-right" data-aos-delay="300">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="name" id="name"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                           value="{{ old('name', $product->name) }}" required>
                </div>

                {{-- Deskripsi --}}
                <div data-aos="fade-left" data-aos-delay="350">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                              required>{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Harga --}}
                <div data-aos="fade-right" data-aos-delay="400">
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Poin Diperlukan)</label>
                    <input type="number" name="price" id="price" min="0"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                           value="{{ old('price', $product->price) }}" required>
                </div>

                {{-- Gambar Produk --}}
                <div data-aos="fade-left" data-aos-delay="450">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                    @if ($product->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg shadow-sm border border-gray-200">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-700
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100
                                  transition-all duration-200">
                    <p class="mt-2 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar. (JPG, PNG, GIF, dll.)</p>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4" data-aos="zoom-in" data-aos-delay="500">
                    <button type="submit"
                            class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-3m-1-4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Update Produk
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                       class="inline-flex items-center justify-center px-8 py-3 border border-gray-300 text-base font-medium rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 transform transition duration-300 ease-in-out hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        Batal
                    </a>
                </div>
            </form>

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-3xl --}}
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
