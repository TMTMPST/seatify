<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('band_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('spotify_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
