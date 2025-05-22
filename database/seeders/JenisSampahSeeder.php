<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSampah;

class JenisSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSampah = [
            [
                'nama' => 'Sampah Organik',
                'deskripsi' => 'Sampah yang berasal dari makhluk hidup dan mudah terurai secara alami.',
                'ciri_ciri' => 'Mudah membusuk, berair, menimbulkan bau.',
                'contoh' => 'Sisa makanan, daun-daunan, kulit buah, sayuran busuk, ranting pohon.',
                'cara_daur_ulang' => 'Dapat dikomposkan menjadi pupuk organik atau diproses menjadi biogas.',
                'gambar' => 'organik.jpg',
            ],
            [
                'nama' => 'Sampah Anorganik',
                'deskripsi' => 'Sampah yang tidak dapat terurai secara alami atau membutuhkan waktu sangat lama untuk terurai.',
                'ciri_ciri' => 'Tidak mudah membusuk, kering, tidak menimbulkan bau.',
                'contoh' => 'Plastik, kaleng, botol kaca, kertas, kardus, logam.',
                'cara_daur_ulang' => 'Pemilahan berdasarkan jenis material, kemudian diolah menjadi produk baru.',
                'gambar' => 'anorganik.jpg',
            ],
            [
                'nama' => 'Sampah Elektronik (E-Waste)',
                'deskripsi' => 'Sampah yang berasal dari peralatan elektronik yang sudah tidak terpakai.',
                'ciri_ciri' => 'Berupa perangkat elektronik yang rusak atau sudah tidak dipakai.',
                'contoh' => 'Handphone bekas, laptop rusak, TV rusak, baterai bekas, perangkat elektronik lainnya.',
                'cara_daur_ulang' => 'Disalurkan ke tempat pengolahan e-waste untuk diambil komponen yang masih bisa digunakan.',
                'gambar' => 'elektronik.jpg',
            ],
            [
                'nama' => 'Sampah B3 (Bahan Berbahaya dan Beracun)',
                'deskripsi' => 'Sampah yang mengandung zat berbahaya dan beracun yang dapat membahayakan manusia dan lingkungan.',
                'ciri_ciri' => 'Bersifat korosif, mudah terbakar, beracun, atau reaktif.',
                'contoh' => 'Baterai, lampu neon, cat, minyak bekas, obat kadaluarsa, pestisida.',
                'cara_daur_ulang' => 'Harus ditangani khusus oleh lembaga pengelola limbah B3 yang bersertifikat.',
                'gambar' => 'b3.jpg',
            ],
        ];
        
        foreach ($jenisSampah as $sampah) {
            JenisSampah::create($sampah);
        }
    }
}