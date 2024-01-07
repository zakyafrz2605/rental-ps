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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_konsol');
            $table->unsignedBigInteger('id_pembayaran');
            $table->dateTime('mulai');
            $table->dateTime('selesai');

            $table->foreign('id_customer')->on('users')->references('id');
            $table->foreign('id_konsol')->on('konsols')->references('id');
            $table->foreign('id_pembayaran')->on('pembayarans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
