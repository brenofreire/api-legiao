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

            $table->string('nome');
            $table->string('slug')->unique();
            $table->mediumInteger('pontuacao');
            $table->text('descricao')->nullable();
            $table->mediumInteger('tipo')->unsigned();
            $table->enum('cnie', [0,1])->nullable();
            $table->enum('lux', [0,1])->nullable();
            $table->unsignedBigInteger('capitulo');
            $table->timestamp('prazo_final');

            $table->tinyInteger('status'); 
            $table->timestamps();

            $table->index(['capitulo', 'slug', 'tipo']);
            // $table->foreign('tipo')->references('tipo')->on('legiao_tarefas');
        });
        Schema::table('legiao_capitulo_tarefas', function (){
            DB::statement('ALTER TABLE legiao_capitulo_tarefas ADD CONSTRAINT foreign_tipo_tarefas FOREIGN KEY (tipo) REFERENCES legiao_tarefas (tipo)');
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
