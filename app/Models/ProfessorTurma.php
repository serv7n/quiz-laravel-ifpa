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

    public $timestamps = false;
}
