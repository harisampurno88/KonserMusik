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
        Schema::create('artis', function (Blueprint $table) {
            $table->string('id_artis')->primary();
            $table->string('nama_artis');
            $table->enum('genre', ['Pop', 'Dangdut', 'EDM', 'Rock']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artis');
    }
};
