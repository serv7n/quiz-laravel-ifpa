<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = false;

    // ✅ Relação: uma turma tem vários alunos
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'turma_id');
    }

    // ✅ Relação: uma turma tem muitas questões (muitos-para-muitos)
    public function questoes()
    {
        return $this->belongsToMany(
            Questoes::class,     // modelo relacionado
            'questao_turma',     // tabela pivô
            'turma_id',          // chave estrangeira desta tabela
            'questao_id'         // chave estrangeira da outra tabela
        );
    }

    // ✅ Relação: uma turma tem vários professores (muitos-para-muitos)
    public function professores()
    {
        return $this->belongsToMany(
            Professor::class,    // modelo relacionado
            'professor_turma',   // tabela pivô
            'turma_id',          // chave estrangeira da turma
            'professor_id'       // chave estrangeira do professor
        )->select('id', 'user');
    }
}
