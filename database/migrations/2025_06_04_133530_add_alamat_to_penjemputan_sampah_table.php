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
        Schema::table('penjemputan_sampah', function (Blueprint $table) {
            $table->string('alamat')->after('nama'); // Menambahkan kolom 'alamat' setelah kolom 'nama'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjemputan_sampah', function (Blueprint $table) {
            $table->dropColumn('alamat'); // Menghapus kolom 'alamat' jika migrasi di-rollback
        });
    }
};