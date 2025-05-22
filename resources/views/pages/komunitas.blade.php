@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6">
    <h1 class="text-2xl font-bold text-center mb-4">👥 Forum Komunitas EcoLearn</h1>
    <p class="text-gray-700 text-center mb-6">Bergabunglah dalam diskusi, belajar bersama, dan ikuti tantangan komunitas ramah lingkungan!</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 bg-green-50 rounded-lg shadow">
            <h2 class="font-semibold text-lg mb-2">📢 Diskusi Terbaru</h2>
            <ul class="list-disc list-inside text-sm text-gray-700">
                <li><a href="#" class="text-blue-600 hover:underline">Cara membuat kompos di rumah?</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Tips daur ulang plastik kemasan</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Komunitas Clean Up di Surabaya</a></li>
            </ul>
        </div>
        
        <div class="p-4 bg-blue-50 rounded-lg shadow">
            <h2 class="font-semibold text-lg mb-2">🏆 Tantangan Komunitas</h2>
            <ul class="list-disc list-inside text-sm text-gray-700">
                <li><a href="#" class="text-blue-600 hover:underline">Hemat listrik selama 7 hari</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Tidak menggunakan plastik selama seminggu</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Bersihkan area publik bersama komunitas</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
