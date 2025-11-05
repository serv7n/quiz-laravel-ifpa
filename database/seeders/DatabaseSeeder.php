<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        
        $this->call([
            TurmaSeeder::class,
            AlunoSeeder::class,
            ProfessorSeeder::class,
            QuestoesSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
