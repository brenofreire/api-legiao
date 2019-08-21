<?php

use App\Model\LegiaoTarefas;
use Illuminate\Database\Seeder;

class legiao_tarefas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atividades = [
            [
                'nome'       => 'Dia Obrigatório',
                'slug'       => 'dia-obrigatorio',
                'tipo'       => 1,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Dia Obrigatório',
                'status'     => 1,
            ],
            [
                'nome'       => 'Atividade Filatrópica',
                'slug'       => 'atividade-social',
                'tipo'       => 2,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Atividade Filatrópica',
                'status'     => 1,
            ],
            [
                'nome'       => 'Arrecadação de Fundos',
                'slug'       => 'arrecadacao-de-fundos',
                'tipo'       => 3,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Arrecadação de Fundos',
                'status'     => 1,
            ],
            [
                'nome'       => 'Cerimônia Magna de Iniciação',
                'slug'       => 'iniciacao',
                'tipo'       => 4,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Cerimônia Magna de Iniciação',
                'status'     => 1,
            ],
            [
                'nome'       => 'Cerimônia Magna de Elevação',
                'slug'       => 'elevacao',
                'tipo'       => 5,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Cerimônia Magna de Elevação',
                'status'     => 1,
            ],
            [
                'nome'       => 'Incentivo à Frequência',
                'slug'       => 'entretenimento',
                'tipo'       => 6,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Incentivo à Frequência',
                'status'     => 1,
            ],
            [
                'nome'       => 'Trabalho com a Maçonaria',
                'slug'       => 'trabalho-com-a-maconaria',
                'tipo'       => 7,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Trabalho com a Maçonaria',
                'status'     => 1,
            ],
            [
                'nome'       => 'Ano DeMolay',
                'slug'       => 'ano-demolay',
                'tipo'       => 8,
                'cnie'       => 1,
                'lux'        => '0',
                'descricao'  => 'Ano DeMolay',
                'status'     => 1,
            ],
            [
                'nome'       => 'Outros',
                'slug'       => 'outros',
                'tipo'       => 9,
                'descricao'  => 'Atividade geral',
                'status'     => 1,
            ]
        ];
        foreach ($atividades as $atividade) {
            @LegiaoTarefas::updateOrCreate([
                'nome'       => $atividade['nome'],
                'slug'       => $atividade['slug'],
                'tipo'       => $atividade['tipo'],
                'cnie'       => $atividade['cnie'],
                'lux'        => $atividade['lux'],
                'descricao'  => $atividade['descricao'],
                'status'     => $atividade['status'],
            ]);
        }
    }
}
