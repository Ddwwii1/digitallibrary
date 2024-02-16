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
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id_buku')->on('buku');
            $table->unsignedBigInteger('peminjaman_id');
            $table->foreign('peminjaman_id')->references('id_peminjaman')->on('peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
