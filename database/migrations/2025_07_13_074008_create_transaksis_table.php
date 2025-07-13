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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('id_konser');
            $table->foreign('id_konser')
            ->references('id_konser')
            ->on('konser')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('id_tiket');
            $table->foreign('id_tiket')
            ->references('id_tiket')
            ->on('tiket')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('jumlah_tiket');
            $table->decimal('harga_per_tiket', 10, 2);
            $table->decimal('total_harga', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
