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
            // Kolom dari validasi yang belum ada di gambar skema tabel
            $table->string('kota')->after('alamat')->nullable();
            $table->string('kecamatan')->after('kota')->nullable();
            $table->string('telepon', 20)->after('kecamatan')->nullable();
            $table->time('waktu_penjemputan')->after('tanggal_penjemputan')->nullable();
            $table->string('jenis_sampah')->after('waktu_penjemputan')->nullable();
            $table->decimal('perkiraan_berat', 8, 2)->after('jenis_sampah')->nullable(); // Menggunakan decimal untuk berat
            $table->text('catatan')->after('perkiraan_berat')->nullable();

            // Menambahkan user_id jika belum ada (dari controller)
            // Cek apakah kolom user_id sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('penjemputan_sampah', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('id');
            }
            
            // Mengubah kolom 'approved' menjadi boolean dan menambahkan default false jika belum ada atau ingin diubah
            // Asumsi 'approved' saat ini adalah string atau tidak ada. Jika ingin diubah ke boolean.
            // Jika kolom 'approved' sudah ada dan tipenya bukan boolean, Anda mungkin perlu langkah migrasi terpisah atau alter column.
            // Untuk amannya, saya asumsikan ini adalah kolom baru atau perlu diubah ke boolean.
            if (!Schema::hasColumn('penjemputan_sampah', 'approved')) {
                $table->boolean('approved')->default(false)->after('tanggal_penjemputan');
            } else {
                 // Jika 'approved' sudah ada tapi mungkin tipenya tidak boolean atau ingin defaultnya diatur
                 // Anda bisa menambahkan alter table di sini jika perlu mengubah tipe atau default
                 // Contoh: $table->boolean('approved')->default(false)->change(); // Memerlukan doctrine/dbal
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjemputan_sampah', function (Blueprint $table) {
            $table->dropColumn([
                'kota',
                'kecamatan',
                'telepon',
                'waktu_penjemputan',
                'jenis_sampah',
                'perkiraan_berat',
                'catatan',
                'approved' // Jika ditambahkan di up(), maka harus di-drop di down()
            ]);
            // Jika user_id juga ditambahkan di up(), maka drop juga di sini
            if (Schema::hasColumn('penjemputan_sampah', 'user_id')) {
                 $table->dropConstrainedForeignId('user_id'); // Menghapus foreign key dan kolomnya
            }
        });
    }
};