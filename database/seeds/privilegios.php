<?php

use App\Model\Privilegios as AppPrivilegios;
use Illuminate\Database\Seeder;

class privilegios extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'   => 1,
                'nome' => 'Novo',
            ],
            [
                'id'   => 2,
                'nome' => 'Comum',
            ],
            [
                'id'   => 3,
                'nome' => 'Engajador',
            ],
            [
                'id'   => 4,
                'nome' => 'Incumbente',
            ],
            [
                'id'   => 5,
                'nome' => 'Diretoria',
            ],
            [
                'id'   => 6,
                'nome' => 'Gestor',
            ],
            [
                'id'   => 7,
                'nome' => 'Administrador',
            ],
            [
                'id'   => 8,
                'nome' => 'Superadmin',
            ],
        ];
        foreach ($roles as $role) {
            AppPrivilegios::updateOrCreate([
                'id' => $role['id'],
                'nome' => $role['nome'],
            ]);
        }
    }
}
