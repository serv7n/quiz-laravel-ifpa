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
    public function professores()
    {
        return $this->belongsToMany(
            Professor::class,    // model relacionado
            'professor_turma',   // tabela pivot
            'turma_id',          // chave estrangeira da turma
            'professor_id'       // chave estrangeira do professor
        )->select('id', 'user'); // somente campos necessários
    }

}
