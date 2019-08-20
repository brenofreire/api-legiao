<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LegiaoAssinantesTarefasTable extends Model
{
    protected $table = 'legiao_assinantes_tarefas';
    protected $fillable = [
        'atividade', 'pontuacao', 'cid', 'capitulo', 'role', 'done', 'status'
    ];
}
