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
            $table->tinyInteger('atividade')->unsigned(); #atividade
            $table->tinyInteger('pontuacao');
            $table->mediumInteger('usuario')->unsigned(); #usuario
            $table->tinyInteger('capitulo'); #capitulo
            $table->tinyInteger('role'); #role
            $table->tinyInteger('done'); #done
            $table->tinyInteger('status'); #status
            $table->timestamps();

            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->foreign('atividade')->references('id')->on('legiao_capitulo_tarefas');
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
