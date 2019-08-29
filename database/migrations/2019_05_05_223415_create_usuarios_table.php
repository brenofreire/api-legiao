<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('cid')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('cargo_atual')->nullable();
            $table->enum('role', [1,2,3,4,5,6,7,8])->default(1);
            $table->unsignedBigInteger('capitulo');

            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->index(['capitulo', 'nome']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
