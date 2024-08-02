<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('jemaat', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->string('nama_lengkap');
      $table->string('jenis_kelamin');
      $table->string('status_jemaat');
      $table->string('NIK')->nullable();
      $table->string('KK')->nullable();
      $table->string('nomor_handphone')->nullable();
      $table->string('tempat_lahir')->nullable();
      $table->date('tanggal_lahir')->nullable();
      $table->integer('umur')->nullable();
      $table->string('golongan_darah')->nullable();
      $table->string('kondisi_tubuh')->nullable();
      $table->string('alamat')->nullable();
      $table->string('kabupaten')->nullable();
      $table->string('provinsi')->nullable();
      $table->string('pendidikan')->nullable();
      $table->string('pekerjaan')->nullable();
      $table->string('nama_ayah')->nullable();
      $table->string('nama_ibu')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jemaat');
  }
};
