@extends('layouts.app')

@section('content')
<div class="w-full max-w-xl mx-auto bg-white shadow p-6 mt-6 rounded">
    <h2 class="text-xl font-bold mb-4">Form Penjemputan Sampah</h2>

    <form action="#" method="POST">
        @csrf
        <div class="mb-4">
            <label for="alamat" class="block text-left font-semibold">Alamat Penjemputan</label>
            <textarea name="alamat" id="alamat" class="w-full p-2 border rounded" placeholder="Masukkan alamat lengkap..."></textarea>
        </div>

        <div class="mb-4">
            <label for="tanggal" class="block text-left font-semibold">Tanggal Penjemputan</label>
            <input type="date" name="tanggal" id="tanggal" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Ajukan Penjemputan
        </button>
    </form>
</div>
@endsection
