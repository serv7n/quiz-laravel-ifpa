<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questoes extends Model
{
    use HasFactory;

    protected $table = 'questoes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'alt1',
        'alt2',
        'alt3',
        'alt4',
        'altCorreta',
        'timing',
        'comecar'
    ];

    public $timestamps = false;

    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'questao_turma', 'questao_id', 'turma_id');
    }
}
