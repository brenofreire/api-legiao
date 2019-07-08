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
            $table->string('nome', 64);
            $table->string('slug');
            $table->tinyInteger('pontuacao');
            $table->text('descricao')->nullable();
            $table->tinyInteger('tipo')->unsigned();
            $table->tinyInteger('codigo');
            $table->enum('cnie', [0,1])->nullable();
            $table->tinyInteger('lux', [0,1])->nullable();
            $table->tinyInteger('status', [0,1])->nullable();
            $table->timestamp('prazo_final');
            $table->timestamps();

            $table->foreign('tipo')->references('tipo')->on('legiao_tarefas');
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
