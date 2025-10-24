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
   
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('turma_id');

            $table->primary(['professor_id', 'turma_id']);

            $table->index('professor_id', 'fk_prof_turma_professor');
            $table->index('turma_id', 'fk_prof_turma_turma');

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
