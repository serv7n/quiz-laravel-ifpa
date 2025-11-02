<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Executa a migração.
     */
    public function up(): void
    {
        Schema::create('questao_turma', function (Blueprint $table) {
            $table->unsignedBigInteger('questao_id');
            $table->unsignedBigInteger('turma_id');

            // 🔑 Chaves primárias compostas
            $table->primary(['questao_id', 'turma_id']);

            // 🔗 Chaves estrangeiras com integridade referencial
            $table->foreign('questao_id')
                ->references('id')
                ->on('questoes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('turma_id')
                ->references('id')
                ->on('turma')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverte a migração.
     */
    public function down(): void
    {
        Schema::dropIfExists('questao_turma');
    }
};
