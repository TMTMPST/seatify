<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('band_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('band_id')->constrained('bands')->onDelete('cascade');
            $table->string('name');
            $table->string('role');
            $table->string('image')->default('');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('band_members');
    }
};
