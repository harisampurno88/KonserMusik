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
            $table->foreign('id_artis')->references('id_artis')->on('artis')->onDelete('cascade');
            $table->string('id_lokasi');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->onDelete('cascade');
            $table->string('id_promotor');
            $table->foreign('id_promotor')->references('id_promotor')->on('promotor')->onDelete('cascade');
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
