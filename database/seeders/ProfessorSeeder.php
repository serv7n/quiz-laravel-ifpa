<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use App\Models\Turma;

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        // Criar 5 professores
        $professores = [
            ['nome' => 'Carlos Silva'],
            ['nome' => 'Maria Souza'],
            ['nome' => 'João Pereira'],
            ['nome' => 'Ana Oliveira'],
            ['nome' => 'Rafael Costa'],
        ];

        foreach ($professores as $profData) {
            $professor = Professor::create($profData);

            // Associar professor às turmas 1 a 5
            $professor->turmas()->attach([1, 2, 3, 4, 5]);
        }
    }
}
