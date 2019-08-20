<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LegiaoCapituloTarefas extends Model
    {
    protected $fillable = [
        'nome', 'slug', 'pontuacao', 'descricao', 'tipo', 'codigo', 'capitulo', 'cnie', 'lux', 'status', 'prazo_final'
    ];  
}
