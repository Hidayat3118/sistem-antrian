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
        Schema::create('tanggals', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jmlh_umum');
            $table->integer('jmlh_prioritas');
            $table->integer('jmlh_tdk_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggals');
    }
};
