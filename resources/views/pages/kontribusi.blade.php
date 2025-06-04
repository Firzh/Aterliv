@extends('layouts.app')

@section('content')
{{-- Section utama dengan background gradient dan penempatan konten di tengah --}}
<section class="py-16 md:py-20 bg-gradient-to-br from-green-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-5xl mx-auto px-4 md:px-6 w-full">
        {{-- Kontainer utama dengan styling card modern --}}
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-200" data-aos="fade-up" data-aos-easing="ease-out-back" data-aos-duration="800">

            {{-- Header Section --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-2 leading-tight" data-aos="fade-up" data-aos-delay="100">
                    <span class="mr-2 text-green-600">📊</span> Riwayat Kontribusi Lingkungan Anda
                </h1>
                <p class="text-lg md:text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                    Lihat dampak positif yang telah Anda berikan untuk bumi!
                </p>
            </div>

            {{-- Total Emission Summary --}}
            <div class="p-6 bg-green-50 rounded-lg shadow-md border border-green-200 mb-10 text-center" data-aos="zoom-in" data-aos-delay="300">
                <p class="text-xl md:text-2xl text-green-700 font-semibold mb-2">
                    Total Emisi CO₂ yang Telah Anda Kurangi:
                </p>
                <p class="text-5xl md:text-6xl font-extrabold text-green-800 leading-none">
                    {{ number_format($totalEmisi, 2) }} <span class="text-3xl font-normal">kg CO₂eq</span>
                </p>
                <p class="text-sm text-gray-600 mt-2 italic">
                    (Jumlah ini adalah akumulasi kontribusi Anda.)
                </p>
            </div>

            {{-- Chart Section --}}
            <div class="mb-10 p-6 bg-gray-50 rounded-lg shadow-inner border border-gray-200" data-aos="fade-up" data-aos-delay="400">
                <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Tren Kontribusi Emisi CO₂</h2>
                <div class="relative h-80"> {{-- Set a fixed height for the chart container --}}
                    <canvas id="grafikKontribusi"></canvas>
                </div>
            </div>

            {{-- History Table --}}
            <h2 class="text-xl font-bold text-gray-800 mb-4 text-center" data-aos="fade-up" data-aos-delay="500">Detail Riwayat Kontribusi Anda</h2>
            <div class="overflow-x-auto rounded-lg shadow-lg border border-gray-200" data-aos="fade-up" data-aos-delay="600">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-green-500 to-blue-500 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider rounded-tl-lg">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jenis Sampah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Berat (kg)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider rounded-tr-lg">Emisi CO₂ (kg)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($kontribusis as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ ucfirst($item->jenis_sampah) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->berat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ number_format($item->emisi, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-base text-gray-500 italic">
                                    Belum ada kontribusi tercatat. Mulai hitung dampak Anda sekarang!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Statistik Personal --}}
            <div class="mt-10" data-aos="fade-up" data-aos-delay="700">
                <h2 class="text-xl font-bold text-center mb-4">📊 Statistik Kontribusi Anda</h2>
                <p class="text-center text-gray-600 mb-6">Ringkasan dampak positif dari kontribusi Anda</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 bg-green-50 rounded-lg shadow" data-aos="zoom-in" data-aos-delay="800">
                        <h3 class="text-lg font-semibold mb-2">🌱 Total Sampah Didaur Ulang</h3>
                        <p class="text-2xl font-bold text-green-700">{{ number_format($totalBerat, 2) }} kg</p>
                    </div>
                    
                    <div class="p-4 bg-blue-50 rounded-lg shadow" data-aos="zoom-in" data-aos-delay="900">
                        <h3 class="text-lg font-semibold mb-2">⚡ Energi Dihindari</h3>
                        <p class="text-2xl font-bold text-blue-700">{{ number_format($totalEnergi, 2) }} kWh</p>
                    </div>

                    <div class="p-4 bg-yellow-50 rounded-lg shadow" data-aos="zoom-in" data-aos-delay="1000">
                        <h3 class="text-lg font-semibold mb-2">💨 Emisi CO₂ Berkurang</h3>
                        <p class="text-2xl font-bold text-yellow-700">{{ number_format($totalEmisi, 2) }} kg CO₂</p>
                    </div>

                    <div class="p-4 bg-purple-50 rounded-lg shadow" data-aos="zoom-in" data-aos-delay="1100">
                        <h3 class="text-lg font-semibold mb-2">🎯 Jumlah Kontribusi</h3>
                        <p class="text-2xl font-bold text-purple-700">{{ $kontribusis->count() }} kali</p>
                    </div>
                </div>
            </div>

            {{-- Back to Calculator/Dashboard Button --}}
            <div class="mt-10 text-center" data-aos="zoom-in" data-aos-delay="1200">
                <a href="{{ route('pages.kalkulator.index') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-md text-white bg-green-600 hover:bg-green-700 transform transition duration-300 ease-in-out hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Kalkulator
                </a>
            </div>

        </div> {{-- Penutup div.bg-white --}}
    </div> {{-- Penutup div.max-w-5xl --}}
</section>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pastikan Chart.js sudah dimuat sebelum mencoba merender grafik
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('grafikKontribusi');
        if (ctx) { // Cek apakah elemen canvas ada
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($grafikLabels) !!},
                    datasets: [{
                        label: 'Emisi CO₂ Berkurang (kg)',
                        data: {!! json_encode($grafikValues) !!},
                        backgroundColor: 'rgba(52, 211, 153, 0.8)', // Tailwind green-400 dengan opacity
                        borderColor: '#059669', // Tailwind green-600
                        borderWidth: 1,
                        borderRadius: 5, // Sudut membulat untuk batang grafik
                        barPercentage: 0.8, // Mengatur lebar batang relatif terhadap lebar kategori
                        categoryPercentage: 0.7 // Mengatur lebar kategori relatif terhadap ruang yang tersedia
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Memungkinkan grafik untuk mengubah ukuran secara bebas berdasarkan tinggi kontainer induk
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                font: {
                                    size: 14,
                                    family: 'inherit' // Mewarisi font dari body
                                },
                                color: '#374151' // Tailwind gray-700 untuk teks legenda
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)', // Background tooltip yang lebih gelap
                            titleFont: {
                                size: 16,
                                weight: 'bold',
                                family: 'inherit'
                            },
                            bodyFont: {
                                size: 14,
                                family: 'inherit'
                            },
                            padding: 10,
                            displayColors: false, // Sembunyikan kotak warna di tooltip
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('id-ID', { maximumFractionDigits: 2 }).format(context.parsed.y) + ' kg';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false // Sembunyikan garis grid sumbu-x
                            },
                            ticks: {
                                font: {
                                    size: 12,
                                    family: 'inherit'
                                },
                                color: '#4b5563' // Tailwind gray-600 untuk label sumbu-x
                            },
                            title: {
                                display: true,
                                text: 'Periode Kontribusi',
                                font: {
                                    size: 14,
                                    weight: 'bold',
                                    family: 'inherit'
                                },
                                color: '#374151'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Emisi CO₂ (kg)',
                                font: {
                                    size: 14,
                                    weight: 'bold',
                                    family: 'inherit'
                                },
                                color: '#374151'
                            },
                            grid: {
                                color: 'rgba(200, 200, 200, 0.3)', // Garis grid yang lebih terang
                                drawBorder: false // Sembunyikan garis batas sumbu-y
                            },
                            ticks: {
                                font: {
                                    size: 12,
                                    family: 'inherit'
                                },
                                color: '#4b5563' // Tailwind gray-600 untuk label sumbu-y
                            }
                        }
                    }
                }
            });
        }
    });
</script>

{{-- AOS Initialization (Tambahkan ini jika belum ada di layouts/app.blade.php Anda) --}}
<link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // Hanya animasi sekali saat elemen pertama kali terlihat
        mirror: false, // Elemen tidak akan menganimasikan ulang saat digulir melewati
    });
</script>
@endsection