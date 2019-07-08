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
            $table->string('slug');	
            $table->string('tipo', 64);	
            $table->integer('codigo' )->nullable();	
            $table->tinyInteger('cnie')->nullable();
            $table->tinyInteger('lux');		
            $table->text('descricao');
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
        Schema::dropIfExists('legiao_tarefas');
    }
}
