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
        'turma_id',
    ];

    public $timestamps = false;

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
