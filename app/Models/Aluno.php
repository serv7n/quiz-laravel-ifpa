<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

     protected $table = 'aluno';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user',
        'email',
        'senha',
        'pontuacao',
        'turma_id',
    ];


    protected $hidden = [
        'senha',
    ];


    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
