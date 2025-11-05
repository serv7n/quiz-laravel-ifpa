<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'comecou'];


    public $timestamps = false;

    /**
     * Relação 1:N → uma turma tem vários alunos
     */
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'turma_id');
    }

    /**
     * Relação N:N → uma turma possui várias questões
     * usando a tabela pivot "questao_turma"
     */
    public function questoes()
    {
        return $this->belongsToMany(
            Questoes::class,  // nome do model relacionado
            'questao_turma',  // tabela pivot
            'turma_id',       // chave estrangeira de Turma
            'questao_id'      // chave estrangeira de Questoes
        );
    }

    /**
     * Relação N:N → uma turma possui vários professores
     * usando a tabela pivot "professor_turma"
     */
    public function professores()
    {
        return $this->belongsToMany(
            Professor::class,
            'professor_turma',
            'turma_id',
            'professor_id'
        )->select('professor.id', 'professor.user');
    }
}
