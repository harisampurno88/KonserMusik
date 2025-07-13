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
        Schema::table('transaksi', function (Blueprint $table) {
            // Menambahkan kolom 'created_at' dan 'updated_at'
            // Pastikan ini ditambahkan jika belum ada di tabel Anda
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Menghapus kolom 'created_at' dan 'updated_at' jika migrasi di-rollback
            $table->dropTimestamps();
        });
    }
};