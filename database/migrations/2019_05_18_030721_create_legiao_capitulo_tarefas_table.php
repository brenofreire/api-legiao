<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegiaoCapituloTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legiao_capitulo_tarefas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 64);	      //
            $table->string('slug');	          //
            $table->tinyInteger('pontuacao'); //
            $table->text('descricao')->nullable();        //
            $table->tinyInteger('tipo');             # LegiaoTarefas
            $table->tinyInteger('codigo');           # LegiaoTarefas
            $table->enum('cnie', [0,1])->nullable(); # LegiaoTarefas	 	 
            $table->enum('lux', [0,1])->nullable();	 # LegiaoTarefas	
            $table->enum('status', [0,1])->nullable();	 //	
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
        Schema::dropIfExists('legiao_capitulo_tarefas');
    }
}
