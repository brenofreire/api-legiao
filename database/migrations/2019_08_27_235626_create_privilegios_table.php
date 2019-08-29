<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegiosTable extends Migration
{
    public function up()
    {
        Schema::create('privilegios', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('nome');

            $table->index('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('privilegios');
    }
}
