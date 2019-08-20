<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsuariosTemporarios extends Model
{
    protected $fillable = [
        'cid',
        'nome',
        'email',
        'senha',
        'capitulo',
        'role',
        'status',
    ];
}
