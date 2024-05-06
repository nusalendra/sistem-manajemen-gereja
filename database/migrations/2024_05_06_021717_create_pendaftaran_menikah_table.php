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
        Schema::create('pendaftaran_menikah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaat')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_pasangan');
            $table->string('nama_ayah_pasangan');
            $table->string('nama_ibu_pasangan');
            $table->string('umur_pasangan');
            $table->string('tanggal_lahir_pasangan');
            $table->string('nomor_baptis_pasangan');
            $table->date('tanggal_pernikahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_menikah');
    }
};
