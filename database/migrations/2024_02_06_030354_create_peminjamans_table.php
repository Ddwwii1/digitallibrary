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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id_buku')->on('buku');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('tanggal_kembali');
            $table->string('status_peminjaman');
            $table->integer('denda_tambahan')->nullable();
            $table->integer('denda_terlambat')->nullable();
            $table->integer('total_denda')->nullable();
            $table->string('alasan_denda')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
