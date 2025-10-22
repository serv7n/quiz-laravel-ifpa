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

    public $timestamps = true;
}
