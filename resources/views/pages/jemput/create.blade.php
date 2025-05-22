@extends('layouts.app')

@section('content')
<div class="mx-auto mt-6 bg-white p-6 rounded-md shadow-md" style="width: 95%; max-width: 800px;">
    <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">Buat Permintaan Penjemputan</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jemput.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama"
                   class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                   required>
        </div>

        {{-- Telepon --}}
        <div class="mb-4">
            <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
            <input type="text" name="telepon" id="telepon"
                   class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                   required>
        </div>

        {{-- Tanggal & Waktu --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="tanggal_penjemputan" class="block text-sm font-medium text-gray-700">Tanggal Penjemputan</label>
                <input type="date" name="tanggal_penjemputan" id="tanggal_penjemputan"
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                       required>
            </div>
            <div>
                <label for="waktu_penjemputan" class="block text-sm font-medium text-gray-700">Waktu Penjemputan</label>
                <input type="time" name="waktu_penjemputan" id="waktu_penjemputan"
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                       required>
            </div>
        </div>

        {{-- Alamat --}}
        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
            <input type="text" name="alamat" id="alamat"
                   class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                   required>
        </div>

        {{-- Kota & Kecamatan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                <input type="text" name="kota" id="kota"
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                       required>
            </div>
            <div>
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan"
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                       required>
            </div>
        </div>

        {{-- Jenis Sampah --}}
        <div class="mb-4">
            <label for="jenis_sampah" class="block text-sm font-medium text-gray-700">Jenis Sampah</label>
            <select name="jenis_sampah" id="jenis_sampah"
                    class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md bg-white focus:outline-none focus:ring focus:ring-indigo-300"
                    required>
                <option value="" disabled selected>Pilih Jenis Sampah</option>
                @foreach ($jenisSampah as $js)
                    <option value="{{ $js->nama }}">{{ $js->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Berat --}}
        <div class="mb-4">
            <label for="perkiraan_berat" class="block text-sm font-medium text-gray-700">Perkiraan Berat (kg)</label>
            <input type="number" name="perkiraan_berat" id="perkiraan_berat" min="1"
                   class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                   required>
        </div>

        {{-- Catatan --}}
        <div class="mb-4">
            <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan (opsional)</label>
            <textarea name="catatan" id="catatan" rows="3"
                      class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"></textarea>
        </div>

        {{-- Peta --}}
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lokasi pada Peta</label>
            @include('partials.main-map')
        </div>

        {{-- Submit --}}
        <div class="mt-6">
            <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Kirim Permintaan
            </button>
        </div>
    </form>
</div>
@endsection
