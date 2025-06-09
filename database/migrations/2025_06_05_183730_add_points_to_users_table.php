<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('points')->default(0);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('poins')->default(0)->after('password');
            $table->string('level')->default('EcoNewbie')->after('poins');
            $table->string('badge')->nullable()->after('level');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
