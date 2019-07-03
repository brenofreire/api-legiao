<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegiaoAssinantesTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legiao_assinantes_tarefas', function (Blueprint $table) {
            $table->increments('id'); 
            $table->tinyInteger('atividade'); #atividade
            $table->mediumInteger('usuario'); #usuario
            $table->tinyInteger('capitulo'); #capitulo
            $table->tinyInteger('role'); #role
            $table->tinyInteger('done'); #done
            $table->tinyInteger('status'); #status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legiao_assinantes_tarefas');
    }
}
