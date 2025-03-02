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
        Schema::create('daftar_konser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_konser')->onDelete('cascade');
            $table->string('gambar');
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('ketersediaan_tiket', ['tersedia', 'tidak tersedia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_konser');
    }
};
