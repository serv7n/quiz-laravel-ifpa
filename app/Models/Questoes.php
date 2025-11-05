<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questoes extends Model
{
    use HasFactory;

    protected $table = 'questoes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'alt1',
        'alt2',
        'alt3',
        'alt4',
        'altCorreta',
        'timing',
        'turma_id', // existe no banco
    ];

    public function turmas()
    {
        // Relação N:N entre questoes e turma
        return $this->belongsToMany(Turma::class, 'questao_turma', 'questao_id', 'turma_id');
    }

    public function turma()
    {
        // Relação 1:N direta (coluna turma_id na tabela questoes)
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
