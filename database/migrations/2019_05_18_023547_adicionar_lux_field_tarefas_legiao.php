<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarLuxFieldTarefasLegiao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legiao_tarefas', function(Blueprint $table){
            $table->tinyInteger('lux')->after('cnie');
        });
    }
}
