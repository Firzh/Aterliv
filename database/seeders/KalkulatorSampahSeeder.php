<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KalkulatorSampah;

class KalkulatorSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kalkulatorData = [
            [
                'jenis_sampah_id' => 1, // Sampah Organik
                'faktor_emisi' => 0.85, // CO2 yang dihemat per kg (dalam kg)
                'faktor_pengurangan' => 1.00, // Pengurangan limbah per kg (dalam kg)
            ],
            [
                'jenis_sampah_id' => 2, // Sampah Anorganik
                'faktor_emisi' => 2.50, // CO2 yang dihemat per kg (dalam kg)
                'faktor_pengurangan' => 1.00, // Pengurangan limbah per kg (dalam kg)
            ],
            [
                'jenis_sampah_id' => 3, // Sampah Elektronik
                'faktor_emisi' => 20.00, // CO2 yang dihemat per kg (dalam kg)
                'faktor_pengurangan' => 1.00, // Pengurangan limbah per kg (dalam kg)
            ],
            [
                'jenis_sampah_id' => 4, // Sampah B3
                'faktor_emisi' => 15.00, // CO2 yang dihemat per kg (dalam kg)
                'faktor_pengurangan' => 1.00, // Pengurangan limbah per kg (dalam kg)
            ],
        ];
        
        foreach ($kalkulatorData as $data) {
            KalkulatorSampah::create($data);
        }
    }
}