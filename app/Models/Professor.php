<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


    public function turmas()
    {
        return $this->belongsToMany(
            Turma::class,
            'professor_turma',
            'professor_id',
            'turma_id'
        )->select('id', 'name');
    }

    public $timestamps = true;
}
