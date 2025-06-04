<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSampah;

class JenisSampahSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Plastik',
                'deskripsi' => 'Sampah yang terbuat dari bahan plastik.',
                'ciri_ciri' => 'Ringan, tahan air, tidak mudah terurai.',
                'contoh' => 'Botol plastik, kantong plastik, sedotan.',
                'cara_daur_ulang' => 'Dapat dilelehkan dan dicetak ulang menjadi produk baru.',
                'gambar' => 'plastik.jpg',
            ],
            [
                'nama' => 'Kertas',
                'deskripsi' => 'Sampah berbahan dasar kertas.',
                'ciri_ciri' => 'Mudah terbakar, ringan, mudah terurai.',
                'contoh' => 'Koran, buku, kardus.',
                'cara_daur_ulang' => 'Dicacah dan dicetak ulang menjadi kertas daur ulang.',
                'gambar' => 'kertas.jpg',
            ],
            [
                'nama' => 'Kaca',
                'deskripsi' => 'Sampah dari bahan kaca.',
                'ciri_ciri' => 'Bening atau buram, keras dan rapuh.',
                'contoh' => 'Botol kaca, jendela pecah.',
                'cara_daur_ulang' => 'Dilelehkan dan dibentuk ulang.',
                'gambar' => 'kaca.jpg',
            ],
            [
                'nama' => 'Logam',
                'deskripsi' => 'Sampah dari logam atau besi.',
                'ciri_ciri' => 'Berat, kuat, tahan lama.',
                'contoh' => 'Kaleng, paku, baut.',
                'cara_daur_ulang' => 'Dilelehkan dan dibentuk ulang.',
                'gambar' => 'logam.jpg',
            ],
            [
                'nama' => 'Organik',
                'deskripsi' => 'Sampah yang berasal dari makhluk hidup.',
                'ciri_ciri' => 'Mudah membusuk, bisa jadi kompos.',
                'contoh' => 'Sisa makanan, daun kering.',
                'cara_daur_ulang' => 'Dibuat menjadi kompos atau biogas.',
                'gambar' => 'organik.jpg',
            ],
        ];

        foreach ($data as $item) {
            JenisSampah::create($item);
        }
    }
}
