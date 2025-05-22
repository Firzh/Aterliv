<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kalkulator_sampah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_sampah_id');
            $table->decimal('faktor_emisi', 10, 4); // CO2 yang bisa dihemat per kg
            $table->decimal('faktor_pengurangan', 10, 4); // Pengurangan limbah per kg
            $table->timestamps();
            
            $table->foreign('jenis_sampah_id')->references('id')->on('jenis_sampah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalkulator_sampah');
    }
};