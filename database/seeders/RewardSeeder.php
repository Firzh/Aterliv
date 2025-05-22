<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Reward::create([
            'nama' => 'Voucher Diskon 20%',
            'deskripsi' => 'Dapat digunakan untuk belanja ramah lingkungan',
            'poin_diperlukan' => 100,
        ]);

        Reward::create([
            'nama' => 'Tumbler EcoLearn',
            'deskripsi' => 'Merchandise eksklusif pengguna aktif',
            'poin_diperlukan' => 300,
        ]);

        Reward::create([
        'nama' => 'Voucher Belanja Rp 10.000',
        'deskripsi' => 'Dapat digunakan di toko mitra',
        'poin_diperlukan' => 100,
        ]);

        Reward::create([
            'nama' => 'Tumbler Eco Friendly',
            'deskripsi' => 'Tumbler hemat plastik',
            'poin_diperlukan' => 200,
        ]);

        Reward::create([
            'nama' => 'Bibit Tanaman',
            'deskripsi' => 'Tanam kembali untuk bumi',
            'poin_diperlukan' => 50,
        ]);

        Reward::create([
        'nama' => 'Totebag Daur Ulang',
        'deskripsi' => 'Totebag dari bahan ramah lingkungan untuk aktivitas sehari-hari.',
        'poin_diperlukan' => 150,
        ]);
        Reward::create([
            'nama' => 'Pulpen Bambu',
            'deskripsi' => 'Pulpen unik dari bambu, mendukung pengurangan plastik.',
            'poin_diperlukan' => 75,
        ]); 
        Reward::create([
            'nama' => 'E-Book Lingkungan Gratis',
            'deskripsi' => 'E-book menarik tentang pelestarian lingkungan dan gaya hidup hijau.',
            'poin_diperlukan' => 50,
        ]);
        Reward::create([
            'nama' => 'Diskon 20% di Toko Hijau',
            'deskripsi' => 'Voucher diskon di toko yang menjual produk ramah lingkungan.',
            'poin_diperlukan' => 120,
        ]);
        Reward::create([
            'nama' => 'Tanaman Mini dalam Pot',
            'deskripsi' => 'Tanaman hias kecil yang bisa menghijaukan meja kerja atau kamar.',
            'poin_diperlukan' => 180,
        ]);
    }
}
