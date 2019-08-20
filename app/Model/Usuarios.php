<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'cid', 'nome', 'email', 'senha', 'role', 'status', 'capitulo'
    ];
}
