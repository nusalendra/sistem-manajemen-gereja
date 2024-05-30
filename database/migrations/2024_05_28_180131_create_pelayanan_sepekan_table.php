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
        Schema::create('pelayanan_sepekan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warta_jemaat_id')->constrained('warta_jemaat')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('hari');
            $table->string('jam');
            $table->string('kegiatan');
            $table->string('firman');
            $table->string('liturgos');
            $table->string('gitaris')->nullable();
            $table->string('singer')->nullable();
            $table->string('musik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan_sepekan');
    }
};
