<?php

use Illuminate\Database\Seeder;

class usuarios extends Seeder
{
    public function run() {
        DB::table('usuarios')->insert([
            'cid'      => 38938,
            'nome'     => 'breno freire',
            'email'    => 'breno@breno.com',
            'senha'    => base64_encode('123123123'),
            'capitulo' => 99,
            'status'   => 1,
            'role'     => 8,
        ]);
    }
}
