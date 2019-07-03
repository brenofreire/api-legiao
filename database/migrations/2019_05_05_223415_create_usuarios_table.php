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
            $table->integer('CID')->unique();
            $table->char('email', 128)->unique();
            $table->char('senha', 128);
            $table->enum('role', [1,2,3,4,5,6,7,8]);
            $table->timestamps();
        });
    }

    /**
     * ini, gdm, ofi, dir, mc/cc, mcr/oe, mce/gce, mcn/sc
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
