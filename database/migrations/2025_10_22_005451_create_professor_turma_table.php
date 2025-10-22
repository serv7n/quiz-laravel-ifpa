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
        Schema::create('professor_turma', function (Blueprint $table) {
            // Corrigido para tipos compatíveis
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('turma_id');

            // Chave primária composta
            $table->primary(['professor_id', 'turma_id']);

            // Índices (opcional, mas mantidos como no SQL original)
            $table->index('professor_id', 'fk_prof_turma_professor');
            $table->index('turma_id', 'fk_prof_turma_turma');

            // Chaves estrangeiras
            $table->foreign('professor_id')
                  ->references('id')->on('professor')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('turma_id')
                  ->references('id')->on('turma')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_turma');
    }
};
