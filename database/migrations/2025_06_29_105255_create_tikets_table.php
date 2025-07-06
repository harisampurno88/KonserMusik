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
        Schema::create('tiket', function (Blueprint $table) {
            $table->string('id_tiket')->primary();
            $table->string('id_konser');
            $table->foreign('id_konser')->references('id_konser')->on('konser')->onDelete('cascade');
            $table->enum('jenis_tiket', ['VVIP', 'VIP', 'Reguler']);
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
