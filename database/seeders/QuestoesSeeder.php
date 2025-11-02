<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questoes;

class QuestoesSeeder extends Seeder
{
    /**
     * Executa o seeder.
     */
    public function run(): void
    {
        $questoes = [
            [
                'title' => 'Qual é o resultado de 2 + 2?',
                'alt1' => '3',
                'alt2' => '4',
                'alt3' => '5',
                'alt4' => '22',
                'altCorreta' => 'alt2',
                'timing' => 15,
                'turma_id' => 1,
            ],
            [
                'title' => 'Quem descobriu o Brasil?',
                'alt1' => 'Dom Pedro II',
                'alt2' => 'Cristóvão Colombo',
                'alt3' => 'Pedro Álvares Cabral',
                'alt4' => 'Tiradentes',
                'altCorreta' => 'alt3',
                'timing' => 20,
                'turma_id' => 1,
            ],
            [
                'title' => 'Qual planeta é conhecido como “planeta vermelho”?',
                'alt1' => 'Vênus',
                'alt2' => 'Marte',
                'alt3' => 'Júpiter',
                'alt4' => 'Saturno',
                'altCorreta' => 'alt2',
                'timing' => 20,
                'turma_id' => 2,
            ],
            [
                'title' => 'Em que linguagem o framework Laravel é escrito?',
                'alt1' => 'Python',
                'alt2' => 'PHP',
                'alt3' => 'JavaScript',
                'alt4' => 'C#',
                'altCorreta' => 'alt2',
                'timing' => 25,
                'turma_id' => 2,
            ],
            [
                'title' => 'Qual destes animais é um mamífero?',
                'alt1' => 'Sapo',
                'alt2' => 'Tubarão',
                'alt3' => 'Golfinho',
                'alt4' => 'Cobra',
                'altCorreta' => 'alt3',
                'timing' => 15,
                'turma_id' => 3,
            ],
        ];

        foreach ($questoes as $questao) {
            Questoes::create($questao);
        }
    }
}
