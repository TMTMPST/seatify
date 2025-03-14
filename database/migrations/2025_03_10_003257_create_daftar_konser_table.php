<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('daftar_konser', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('gambar');
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();
            $table->boolean('ketersediaan_tiket')->nullable();
            $table->unsignedBigInteger('band_id')->nullable();

            // Foreign key constraints
            $table->foreign('kategori_id')->references('id')->on('kategori_konser')->onDelete('cascade');
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_konser');
    }
};
