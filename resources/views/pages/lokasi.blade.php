{{-- lokasi.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Lokasi Daur Ulang</h1>

    {{-- Filter form tetap --}}
    <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4"> ... </form>

    {{-- Daftar lokasi tetap --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> ... </div>

    {{-- Sisipkan Peta --}}
    <div class="mt-10">
        @include('partials.main-map')
    </div>
@endsection
