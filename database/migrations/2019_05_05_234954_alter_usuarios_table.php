<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE usuarios CHANGE COLUMN role role ENUM('0','1','2','3','4','5','6','7','8') NOT NULL DEFAULT '0'");

    }

    public function down()
    {
        
    }
}
