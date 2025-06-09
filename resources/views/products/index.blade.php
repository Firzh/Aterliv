@extends('layouts.app')

@section('content')
<section class="py-16 md:py-20 bg-gradient-to-br from-green-50 to-blue-50 min-h-screen flex items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 md:px-6 w-full">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up">

            {{-- Header --}}
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-green-800 mb-2" data-aos="fade-up" data-aos-delay="100">🎁 Produk Kami</h2>
                <p class="text-gray-600 text-lg" data-aos="fade-up" data-aos-delay="200">Tukarkan poin Anda dengan produk menarik di bawah ini!</p>
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-6 flex items-center justify-center" data-aos="zoom-in">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                    </svg>
                    <p>{{ session('success') }}</p>
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6 flex items-center justify-center" data-aos="zoom-in">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            {{-- User Points --}}
            <div class="mb-8 text-center text-xl text-blue-800 font-semibold" data-aos="fade-up" data-aos-delay="300">
                Saldo Poin Anda: <span class="font-bold">{{ auth()->user()->points }} Poin</span>
            </div>

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $index => $product)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl overflow-hidden transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ 400 + ($index * 100) }}">
                        @if ($product->image)
                            <div class="h-48 w-full overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif
                        <div class="p-5">
                            <h5 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h5>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <p class="text-yellow-700 font-bold mb-4">✨ {{ number_format($product->price, 0, ',', '.') }} Poin</p>

                            {{-- Button Tukar --}}
                            <form action="{{ route('products.exchange', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition-colors duration-300"
                                    @if(auth()->user()->points < $product->price) disabled class="opacity-50 cursor-not-allowed" @endif>
                                    Tukar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Empty State --}}
            @if ($products->isEmpty())
                <div class="text-center text-gray-500 italic mt-10" data-aos="fade-up" data-aos-delay="600">
                    <p class="text-lg mb-2">Belum ada produk yang tersedia saat ini.</p>
                    <p>Silakan cek kembali nanti!</p>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- AOS Init --}}
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
