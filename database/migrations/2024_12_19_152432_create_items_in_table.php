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
        Schema::create('items_in', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang');
            $table->foreign('kd_barang')->references('kd_barang')->on('items')->onDelete('cascade');
            $table->integer('qty');
            $table->string('origin');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_in');
    }
};