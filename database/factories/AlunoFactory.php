<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => Hash::make('123456'), 
            'pontuacao' => $this->faker->numberBetween(0,1000),
            'turma_id' => null, 
        ];
    }
}
