<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorTurma extends Model
{
    use HasFactory;

    protected $table = 'professor_turma';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'professor_id',
        'turma_id',
    ];
    // app/Models/Turma.php
    public function professores()
    {
        return $this->belongsToMany(
            Professor::class,       // modelo relacionado
            'professor_turma',      // nome da tabela pivot
            'turma_id',             // chave estrangeira da turma na tabela pivot
            'professor_id'          // chave estrangeira do professor na tabela pivot
        );
    }

    public $timestamps = false;
}
