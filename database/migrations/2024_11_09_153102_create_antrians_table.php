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
            $table->string('no_telp');
            $table->string('nomor_antrian');
            $table->boolean('isPriority');
            $table->boolean('isFinish');
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
