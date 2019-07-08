<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTemporariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_temporarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('CID')->unique();
            $table->string('nome');
            $table->string('email', 128)->unique();
            $table->string('senha', 128);
            $table->integer('capitulo');
            $table->enum('role', [0,1,2,3,4,5,6,7,8]);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('usuarios_temporarios');
    }
}
