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
        Schema::create('konser', function (Blueprint $table) {
            $table->string('id_konser')->primary();
            $table->string('nama_konser');
            $table->date('tanggal');
            $table->string('id_artis');
            $table->string('id_lokasi');
            $table->string('id_promotor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konser');
    }
};
