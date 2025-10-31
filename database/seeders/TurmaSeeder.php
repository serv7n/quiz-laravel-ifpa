<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmaSeeder extends Seeder
{
    public function run()
    {
        Turma::create(['id' => 1, 'name' => 'TA23']);
        Turma::create(['id' => 2, 'name' => 'TA24']);
        Turma::create(['id' => 3, 'name' => 'TA25']);
        Turma::create(['id' => 4, 'name' => 'TI21']);
        Turma::create(['id' => 5, 'name' => 'TI22']);
        Turma::create(['id' => 6, 'name' => 'TI24']);
        Turma::create(['id' => 7, 'name' => 'TE22']);
    }
}
