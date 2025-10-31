<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash; // <- necessário para Hash::make

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        $senhaPadrao = Hash::make('123456'); // mesma senha para todos

        Professor::create([
            'id' => 1,
            'user' => 'Carlos Silva',
            'password' => $senhaPadrao,
        ]);

        Professor::create([
            'id' => 2,
            'user' => 'Maria Souza',
            'password' => $senhaPadrao,
        ]);

        Professor::create([
            'id' => 3,
            'user' => 'João Pereira',
            'password' => $senhaPadrao,
        ]);

        Professor::create([
            'id' => 4,
            'user' => 'Ana Oliveira',
            'password' => $senhaPadrao,
        ]);

        // Associar professores às turmas manualmente
        \DB::table('professor_turma')->insert([
            ['professor_id' => 1, 'turma_id' => 1],
            ['professor_id' => 1, 'turma_id' => 2],
            ['professor_id' => 2, 'turma_id' => 1],
            ['professor_id' => 2, 'turma_id' => 3],
            ['professor_id' => 3, 'turma_id' => 2],
            ['professor_id' => 3, 'turma_id' => 4],
            ['professor_id' => 4, 'turma_id' => 5],
        ]);
    }
}
