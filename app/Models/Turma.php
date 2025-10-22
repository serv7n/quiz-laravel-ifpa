<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'turma_id');
    }

    public function questoes()
    {
        return $this->hasMany(Questoes::class, 'turma_id');
    }
}
