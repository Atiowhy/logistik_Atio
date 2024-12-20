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
        Schema::create('items_out', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang');
            $table->foreign('kd_barang')->references('kd_barang')->on('items')->onDelete('cascade');
            $table->integer('qty');
            $table->string('destination');
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_out');
    }
};