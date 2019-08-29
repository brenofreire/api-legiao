<?php

use App\Model\Cargos as AppCargos;
use Illuminate\Database\Seeder;

class cargos extends Seeder
{
    public function run()
    {
        $cargos = [
            [
                'id'   => 1,
                'nome' => 'Mestre Conselheiro',
            ],
            [
                'id'   => 2,
                'nome' => 'Primeiro Conselheiro',
            ],
            [
                'id'   => 3,
                'nome' => 'Segundo Conselheiro',
            ],
            [
                'id'   => 4,
                'nome' => 'Primeiro Diácono',
            ],
            [
                'id'   => 5,
                'nome' => 'Segundo Diácono',
            ],
            [
                'id'   => 6,
                'nome' => 'Primeiro Mordomo',
            ],
            [
                'id'   => 7,
                'nome' => 'Segundo Mordomo',
            ],
            [
                'id'   => 8,
                'nome' => 'Escrivão',
            ],
            [
                'id'   => 9,
                'nome' => 'Tesoureiro',
            ],
            [
                'id'   => 10,
                'nome' => 'Hospitaleiro',
            ],
            [
                'id'   => 11,
                'nome' => 'Orador',
            ],
            [
                'id'   => 12,
                'nome' => 'Porta Bandeira',
            ],
            [
                'id'   => 13,
                'nome' => 'Capelão',
            ],
            [
                'id'   => 14,
                'nome' => 'Mestre de Cerimônias',
            ],
            [
                'id'   => 15,
                'nome' => 'Primeiro Preceptor',
            ],
            [
                'id'   => 16,
                'nome' => 'Segundo Preceptor',
            ],
            [
                'id'   => 17,
                'nome' => 'Terceiro Preceptor',
            ],
            [
                'id'   => 18,
                'nome' => 'Quarto Preceptor',
            ],
            [
                'id'   => 19,
                'nome' => 'Quinto Preceptor',
            ],
            [
                'id'   => 20,
                'nome' => 'Sexto Preceptor',
            ],
            [
                'id'   => 21,
                'nome' => 'Sétimo Preceptor',
            ],
            [
                'id'   => 22,
                'nome' => 'Organista',
            ],
            [
                'id'   => 23,
                'nome' => 'Sentinela',
            ],
        ];
        foreach ($cargos as $cargo) {
            AppCargos::updateOrCreate([
                'id' => $cargo['id'],
                'nome' => $cargo['nome'],
            ]);
        }
    }
}
