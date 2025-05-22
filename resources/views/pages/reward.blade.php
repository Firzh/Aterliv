@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Tukar Poin dengan Reward</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <p class="mb-4">Poin Anda: <strong>{{ Auth::user()->poin }}</strong></p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($rewards as $item)
            <div class="border p-4 rounded shadow">
                <h2 class="font-bold">{{ $item->nama }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $item->deskripsi }}</p>
                <p class="font-semibold mb-2">Poin: {{ $item->poin_diperlukan }}</p>

                <form action="{{ route('reward.tukar', $item->id) }}" method="POST">
                    @csrf
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Tukar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
