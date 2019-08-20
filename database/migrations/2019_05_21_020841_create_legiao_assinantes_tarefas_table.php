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

            $table->mediumInteger('atividade')->unsigned(); 
            $table->mediumInteger('pontuacao');
            $table->unsignedBigInteger('cid')->unsigned()->unique(); 
            $table->mediumInteger('capitulo'); 
            $table->tinyInteger('role'); 
            $table->tinyInteger('done'); 

            $table->tinyInteger('status'); 
            $table->timestamps();

            $table->index(['capitulo', 'atividade', 'cid']);
            $table->foreign('cid')->references('cid')->on('usuarios');
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
