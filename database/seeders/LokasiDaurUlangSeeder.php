<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LokasiDaurUlang;

class LokasiDaurUlangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokasiData = [
            [
                'nama' => 'Bank Sampah Sejahtera',
                'alamat' => 'Jl. Raya Pemuda No. 123',
                'kota' => 'Jakarta',
                'kecamatan' => 'Menteng',
                'telepon' => '08123456789',
                'email' => 'sejahtera@banksampah.com',
                'jenis_sampah_diterima' => 'Organik, Anorganik',
                'jam_operasional' => 'Senin-Jumat: 08.00-16.00',
                'latitude' => -6.1754,
                'longitude' => 106.8272,
            ],
            [
                'nama' => 'TPS 3R Cemerlang',
                'alamat' => 'Jl. Bintaro Raya No. 45',
                'kota' => 'Jakarta',
                'kecamatan' => 'Pesanggrahan',
                'telepon' => '08198765432',
                'email' => 'cemerlang@tps3r.com',
                'jenis_sampah_diterima' => 'Organik, Anorganik, Elektronik',
                'jam_operasional' => 'Senin-Sabtu: 07.00-17.00',
                'latitude' => -6.2607,
                'longitude' => 106.7792,
            ],
            [
                'nama' => 'Recycle Center Hijau',
                'alamat' => 'Jl. Pulo Sirih No. 78',
                'kota' => 'Bandung',
                'kecamatan' => 'Cicendo',
                'telepon' => '08567891234',
                'email' => 'hijau@recycler.com',
                'jenis_sampah_diterima' => 'Anorganik, Elektronik, B3',
                'jam_operasional' => 'Senin-Minggu: 09.00-15.00',
                'latitude' => -6.9175,
                'longitude' => 107.6191,
            ],
        ];
        
        foreach ($lokasiData as $lokasi) {
            LokasiDaurUlang::create($lokasi);
        }
    }
}