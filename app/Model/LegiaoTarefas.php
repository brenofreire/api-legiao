<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LegiaoTarefas extends Model
{
    protected $fillable = [
        'slug', 'tipo', 'codigo', 'cnie', 'lux', 'descricao'
    ];
    public $timestamps = false;
}
