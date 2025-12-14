<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questoes;
use Illuminate\Support\Facades\DB;

class QuestoesSeeder extends Seeder
{
    /**
     * Executa o seeder.
     */
    public function run(): void
    {
        $questoes = [
            [
                'title' => 'Qual é o valor de 7 + 5?',
                'alt1' => '10',
                'alt2' => '11',
                'alt3' => '12',
                'alt4' => '13',
                'altCorreta' => 'alt3',
                'timing' => 15,
                'turmas' => [1],
            ],
            [
                'title' => 'Quem foi o primeiro presidente do Brasil?',
                'alt1' => 'Getúlio Vargas',
                'alt2' => 'Deodoro da Fonseca',
                'alt3' => 'Juscelino Kubitschek',
                'alt4' => 'Dom Pedro II',
                'altCorreta' => 'alt2',
                'timing' => 20,
                'turmas' => [1],
            ],
            [
                'title' => 'Qual é o maior planeta do Sistema Solar?',
                'alt1' => 'Terra',
                'alt2' => 'Júpiter',
                'alt3' => 'Saturno',
                'alt4' => 'Urano',
                'altCorreta' => 'alt2',
                'timing' => 20,
                'turmas' => [1],
            ],
            [
                'title' => 'Em qual continente fica o Brasil?',
                'alt1' => 'África',
                'alt2' => 'Europa',
                'alt3' => 'América do Sul',
                'alt4' => 'Ásia',
                'altCorreta' => 'alt3',
                'timing' => 15,
                'turmas' => [1],
            ],
            [
                'title' => 'Qual desses animais é uma ave?',
                'alt1' => 'Morcego',
                'alt2' => 'Galinha',
                'alt3' => 'Sapo',
                'alt4' => 'Jacaré',
                'altCorreta' => 'alt2',
                'timing' => 15,
                'turmas' => [1],
            ],
            [
                'title' => 'O que significa a sigla “HTML”?',
                'alt1' => 'HyperText Markup Language',
                'alt2' => 'HighTask Machine Logic',
                'alt3' => 'Hyper Transfer Main Link',
                'alt4' => 'Home Tool Markup List',
                'altCorreta' => 'alt1',
                'timing' => 25,
                'turmas' => [1],
            ],
            [
                'title' => 'Qual é o resultado de 9 × 3?',
                'alt1' => '27',
                'alt2' => '21',
                'alt3' => '18',
                'alt4' => '29',
                'altCorreta' => 'alt1',
                'timing' => 15,
                'turmas' => [1],
            ],
            [
                'title' => 'Qual é o processo pelo qual as plantas produzem seu alimento?',
                'alt1' => 'Digestão',
                'alt2' => 'Respiração',
                'alt3' => 'Fotossíntese',
                'alt4' => 'Filtração',
                'altCorreta' => 'alt3',
                'timing' => 20,
                'turmas' => [1],
            ],
            [
                'title' => 'Quem escreveu “Dom Casmurro”?',
                'alt1' => 'Machado de Assis',
                'alt2' => 'Clarice Lispector',
                'alt3' => 'José de Alencar',
                'alt4' => 'Manuel Bandeira',
                'altCorreta' => 'alt1',
                'timing' => 25,
                'turmas' => [1],
            ],
            [
                'title' => 'Qual é o estado brasileiro conhecido como “terra do sol nascente”?',
                'alt1' => 'Piauí',
                'alt2' => 'Paraíba',
                'alt3' => 'Ceará',
                'alt4' => 'Pernambuco',
                'altCorreta' => 'alt2',
                'timing' => 20,
                'turmas' => [1],
            ],
        ];

        foreach ($questoes as $dados) {
            // Cria a questão (sem turma_id)
            $questao = Questoes::create([
                'title' => $dados['title'],
                'alt1' => $dados['alt1'],
                'alt2' => $dados['alt2'],
                'alt3' => $dados['alt3'],
                'alt4' => $dados['alt4'],
                'altCorreta' => $dados['altCorreta'],
                'timing' => $dados['timing'],
            ]);

            // Vincula a questão às turmas na tabela pivot
            foreach ($dados['turmas'] as $turmaId) {
                DB::table('questao_turma')->insert([
                    'questao_id' => $questao->id,
                    'turma_id' => $turmaId,
                ]);
            }
        }
    }
}
