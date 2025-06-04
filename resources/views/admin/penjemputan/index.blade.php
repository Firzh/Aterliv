@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah halaman --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-7xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">📋</span> Daftar Permintaan Penjemputan
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Kelola dan setujui permintaan penjemputan sampah dari pengguna.
                </p>
            </div>

            {{-- Flash Messages (Success/Error) --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-6 flex items-center" data-aos="zoom-in" data-aos-delay="250">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            @if($penjemputan->isEmpty())
                <div class="text-center p-8 text-gray-500 italic" data-aos="fade-up" data-aos-delay="400">
                    <p class="text-lg mb-2">Tidak ada permintaan penjemputan yang tercatat saat ini.</p>
                    <p>Semua terlihat bersih!</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200" data-aos="fade-up" data-aos-delay="400">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider rounded-tl-lg">Nama</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Telepon</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Alamat Lengkap</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Jadwal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Jenis Sampah</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Berat (kg)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($penjemputan as $index => $item)
                                <tr class="hover:bg-gray-50 transition-colors duration-200" data-aos="fade-up" data-aos-delay="{{ 450 + ($index * 50) }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->telepon }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $item->alamat }}, {{ $item->kecamatan }}, {{ $item->kota }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->tanggal_penjemputan }} {{ $item->waktu_penjemputan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ ucfirst($item->jenis_sampah) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->perkiraan_berat }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($item->status == 'menunggu') bg-yellow-100 text-yellow-800
                                            @elseif($item->status == 'diproses') bg-blue-100 text-blue-800
                                            @elseif($item->status == 'selesai') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <form action="{{ route('admin.penjemputan.updateStatus', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <div class="relative inline-block text-left">
                                                <select name="status"
                                                        class="block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none pr-8"
                                                        onchange="this.form.submit()">
                                                    <option value="" disabled selected>Pilih Aksi</option>
                                                    @if($item->status == 'menunggu')
                                                        <option value="diproses">Terima</option>
                                                        <option value="dibatalkan">Tolak</option>
                                                    @elseif($item->status == 'diproses')
                                                        <option value="selesai">Selesai</option>
                                                        <option value="dibatalkan">Batalkan</option>
                                                    @endif
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-8 text-gray-500 italic">Tidak ada permintaan saat ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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