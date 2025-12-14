<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Cria alguns alunos fixos (caso precise logar neles)
        Aluno::create([
            'user' => 'admin',
            'email' => 'admin@example.com',
            'senha' => Hash::make('admin123'),
            'pontuacao' => 999,
            'turma_id' => 1,
        ]);

        Aluno::create([
            'user' => 'joao',
            'email' => 'joao@example.com',
            'senha' => Hash::make('123456'),
            'pontuacao' => 50,
            'turma_id' => 1,
        ]);

        // 🔹 Cria 10 alunos aleatórios via Factory
        // Aluno::factory()->count(10)->create();
    }
}
