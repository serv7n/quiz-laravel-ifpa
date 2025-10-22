<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->id(); // INT UNSIGNED AUTO_INCREMENT
            $table->text('title');
            $table->string('alt1', 255)->nullable();
            $table->string('alt2', 255)->nullable();
            $table->string('alt3', 255)->nullable();
            $table->string('alt4', 255)->nullable();
            $table->enum('altCorreta', ['alt1', 'alt2', 'alt3', 'alt4']);
            $table->integer('timing')->nullable();
            $table->unsignedBigInteger('turma_id')->nullable();

            $table->foreign('turma_id')
                  ->references('id')
                  ->on('turma')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questoes');
    }
};
