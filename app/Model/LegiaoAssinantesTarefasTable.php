<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LegiaoAssinantesTarefasTable extends Model
{
    protected $table = 'legiao_assinantes_tarefas';
    protected $fillable = [
        'atividade', 'pontuacao', 'cid', 'capitulo', 'role', 'done', 'status'
    ];
    public function demolay(){
        return $this->hasOne('App\Model\Usuarios','cid', 'cid');
    }
}
