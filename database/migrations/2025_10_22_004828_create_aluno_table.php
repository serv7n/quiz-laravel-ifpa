<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('aluno')) {
            Schema::create('aluno', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user', length: 100)->unique();
                $table->string('email', 150)->nullable()->unique();
                $table->string('senha', 255);
                $table->integer('pontuacao')->default(0);
                $table->unsignedBigInteger('turma_id')->nullable();

                $table->foreign('turma_id')->references('id')->on('turma')
                    ->onUpdate('cascade')->onDelete('set null');
                $table->timestamps();

            });


        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno');
    }
};