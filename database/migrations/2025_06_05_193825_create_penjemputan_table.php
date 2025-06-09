<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon');
            $table->date('tanggal_penjemputan');
            $table->time('waktu_penjemputan');
            $table->string('jenis_sampah');
            $table->float('perkiraan_berat');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('penjemputan');
    }
};
