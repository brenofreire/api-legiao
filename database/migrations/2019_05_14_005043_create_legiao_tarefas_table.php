<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegiaoTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legiao_tarefas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();	
            $table->string('nome');	
            $table->mediumInteger('tipo')->unsigned();	
            $table->enum('cnie', [0,1])->nullable();
            $table->enum('lux', [0,1])->nullable();		
            $table->text('descricao')->nullable();
            
            $table->tinyInteger('status'); 

            $table->index(['tipo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legiao_tarefas');
    }
}
