@extends('layouts.guest')

@section('content')
<div class="max-w-3xl mx-auto text-center" style="padding: 2rem;">
    <h1 class="text-3xl font-bold text-green-600 mb-4" style="font-size: 2rem;">Selamat Datang di Återliv</h1>
    <p class="text-gray-600" style="color: #4B5563;">Platform edukasi dan kontribusi lingkungan melalui daur ulang.</p>
    
    <div class="mt-6 flex flex-col sm:flex-row justify-center items-center gap-4">
        <a href="{{ route('login') }}"
           class="px-4 py-2 rounded text-white bg-green-600 hover:bg-green-700 transition"
           style="background-color: #16A34A; color: #fff; text-decoration: none;">
            Login untuk Mulai
        </a>

        <a href="{{ route('google.login') }}"
           class="px-4 py-2 rounded text-white bg-green-600 hover:bg-green-700 transition"
           style="background-color: #16A34A; color: #fff; text-decoration: none;">
            Login dengan Google
        </a>
    </div>
</div>
@endsection
