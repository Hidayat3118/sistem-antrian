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
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->string('no_telp')->nullable();
            $table->string('nomor_antrian');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('catatan');
            $table->boolean('isPriority');
            $table->enum('cluster', ['anak', 'ortu', 'gigi']);
            $table->enum('status', ['completed', 'inComplete', 'unserved'])->default('inComplete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
