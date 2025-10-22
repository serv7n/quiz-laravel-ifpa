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
        Schema::create('professor', function (Blueprint $table) {
            $table->id(); // equivale a INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('user', 100);
            $table->string('email', 150)->nullable();
            $table->string('password', 255);
            $table->timestamps(); // adiciona created_at e updated_at (opcional, mas recomendado)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor');
    }
};
