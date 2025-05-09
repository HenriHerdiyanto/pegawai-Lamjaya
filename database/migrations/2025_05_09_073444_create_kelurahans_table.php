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
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('name');
            $table->foreignId('id_kecamatan');  // Pastikan sudah ada tabel 'kecamatan'
            // $table->foreignId('id_provinsi');  // Pastikan sudah ada tabel 'provinsi'
            $table->string('status');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahans');
    }
};
