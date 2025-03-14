<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint UNSIGNED NOT NULL (auto-increments)
            $table->string('email')->unique()->collation('utf8mb4_unicode_ci'); 
            $table->string('password')->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('level')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('google_id')->nullable(); 
            
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
};

