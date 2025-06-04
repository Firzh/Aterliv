@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="flex flex-col sm:flex-row justify-between items-center mb-10 text-center sm:text-left">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                        <span class="mr-2 text-green-600">📦</span> Daftar Produk Reward
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                        Kelola semua produk yang tersedia untuk ditukar dengan poin.
                    </p>
                </div>
                <div class="mt-6 sm:mt-0" data-aos="zoom-in" data-aos-delay="300">
                    <a href="{{ route('admin.products.create') }}"
                       class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 transform transition duration-300 ease-in-out hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Tambah Produk
                    </a>
                </div>
            </div>

            {{-- Flash Messages (Success) --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="350">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            @if($products->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $index => $product)
                        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden relative group" data-aos="fade-up" data-aos-delay="{{ 400 + ($index * 100) }}">
                            @if($product->image)
                                <div class="h-48 w-full object-cover overflow-hidden">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                {{-- Placeholder if no image --}}
                                <div class="h-48 w-full bg-gray-100 flex items-center justify-center text-gray-400">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-3 flex-grow">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                                <p class="text-lg font-bold text-yellow-700 mb-4 flex items-center">
                                    <span class="mr-2">✨</span> Poin: {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="p-6 border-t border-gray-100 flex justify-between items-center gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 transform transition duration-300 ease-in-out hover:scale-105">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit
                                </a>

                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 transform transition duration-300 ease-in-out hover:scale-105">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center p-8 text-gray-500 italic" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-lg mb-2">Belum ada produk reward yang ditambahkan.</p>
                    <p>Klik "Tambah Produk" untuk mulai menambahkan item!</p>
                </div>
            @endif
        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-7xl --}}
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
