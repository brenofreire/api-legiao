<?php

namespace App\Http\Controllers\Legiao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LegiaoAssinantesTarefasTable as LegiaoAssinantesTarefas;
use Illuminate\Support\Facades\DB;
use App\Model\LegiaoCapituloTarefas;
use App\Model\LegiaoTarefas;
use App\Model\Usuarios;

class LegiaoController extends Controller
{
    public function __constructor(Request $request)
    {
        $header = $request->header('Authorization');
        if ($header !== 'api-legiao-123123123') {
            return response('você não tem permissão para acessar essa página.', 401);
        }
    }

    public function get_atividades_legiao(Request $request)
    {
        $atividades = LegiaoCapituloTarefas::where([
            ['capitulo', '=', $request->get('capitulo')],
            ['status', '=', 1],
            ['lux', '=', '0'],
        ])->get();
        if (count($atividades))
            return response()->json([
                'atividades' => $atividades
            ]);
        return response(null, 204);
    }
    public function get_tipos_tarefa()
    {
        $atividades = LegiaoTarefas::get();
        return response()->json([
            'tipos' => $atividades
        ]);
    }
    public function cadastrar_tarefa(Request $request)
    {
        $atividade = $request->all();
        $atividade['prazo_final'] = Date('Y-m-d H:i:s');
        $criar_atividade = LegiaoCapituloTarefas::create($atividade);
        if ($criar_atividade) return response()->json([
            'ok'        => true,
            'atividade' => $atividade,
            'mensagem'  => 'Atividade criada com sucesso!'
        ], 200);
        else return response()->json([
            'error' => 'Erro ao criar atividade, tente novamente mais tarde!',
        ], 400);
    }
    public function get_usuarios_legiao(Request $request)
    {
        $usuarios_assinados = LegiaoAssinantesTarefas::select('cid')->where([
            ['status', '=', 1],
            ['atividade', '=', $request->get('atividade')],
        ])->get();
        $cids = [];
        foreach ($usuarios_assinados as $value) $cids[] = $value['cid'];
        if (isset($usuarios_assinados))
            $usuarios = Usuarios::whereNotIn('cid', $cids)->with(
                ['pontuacao' => function ($query) {
                    $query->select(DB::raw('SUM(pontuacao) as pontuacao_soma, cid'))->where([
                        ['status', '=', 1]
                    ])->groupBy('cid');
                }]
            )->where('status', 1)->get();
        else $usuarios = Usuarios::get();

        $usuarios_assinados = Usuarios::whereIn('cid', $cids)->with(
            ['pontuacao' => function ($query) {
                $query->select(DB::raw('SUM(pontuacao) as pontuacao_soma, cid'))->where([
                    ['status', '=', 1]
                ])->groupBy('cid');
            }]
        )->where('status', 1)->get();

        foreach ($usuarios_assinados as $usuario) {
            $soma = $usuario['pontuacao']['pontuacao_soma']; unset($usuario['pontuacao']);
            $usuario['pontuacao'] = $soma;
            $usuario['elo'] = $this->getElo($soma);
        }

        return response()->json([
            'usuarios'         => $usuarios,
            'usuarios_remover' => $usuarios_assinados
        ]);
    }
    public function registrar_participante(Request $request)
    {
        $dados = $request->all();
        $usuario_cadastrado = LegiaoAssinantesTarefas::where([
            ['atividade', '=', $dados['atividade']],
            ['capitulo', '=', $dados['capitulo']],
            ['cid', '=', $dados['usuario']],
        ])->count();
        // se não tiver usuário cadastrado, ele cria
        if ($usuario_cadastrado == 0)
            return LegiaoAssinantesTarefas::create([
                'atividade' => $dados['atividade'],
                'pontuacao' => $dados['pontuacao'],
                'cid'       => $dados['usuario'],
                'capitulo'  => $dados['capitulo'],
                'role'      => $dados['role'],
                'done'      => 1,
                'status'    => $dados['acao']
            ]);
        // se tiver usuário cadastrado e ele tiver status 1 e ação for de apagar, ele apaga
        elseif ($usuario_cadastrado == 1 && $dados['acao'] == 0)
            return LegiaoAssinantesTarefas::where([
                ['cid', '=', $dados['usuario']],
                ['atividade', '=', $dados['atividade']]
            ])->update(['status' => 0]);
        // se tiver usuário cadastrado e ele tiver status 0 e ação for de adicionar, ele adiciona
        elseif ($usuario_cadastrado == 1 && $dados['acao'] == 1)
            return LegiaoAssinantesTarefas::where([
                ['cid', '=', $dados['usuario']],
                ['atividade', '=', $dados['atividade']]
            ])->update(['status' => 1]);

        return response(null, 400);
    }
    public function ranking_capitulo(Request $request)
    {
        $ranking = LegiaoAssinantesTarefas::selectRaw('cid, sum(pontuacao) as pontuacao_soma')->where([
            ['capitulo', '=', $request->get('capitulo')],
            ['status', '=', 1]
        ])->with('demolay')->groupBy('cid')->orderBy('pontuacao_soma', 'DESC')->get();
        foreach ($ranking as $usuario) $elo = $this->getElo((int) $usuario['pontuacao_soma']);
        return $ranking;
    }
    public function get_atividades_lux(Request $request)
    {
        $atividades = LegiaoCapituloTarefas::where([
            ['capitulo', '=', $request->get('capitulo')],
            ['status', '=', 1],
            ['lux', '=', '1'],
        ])->get();
        if (count($atividades))
            return response()->json([
                'atividades' => $atividades
            ]);
        return response(null, 204);
    }
    public function getElo($elo)
    {
        if ($elo < 50) return 'Cobre';
        elseif (($elo >= 50) && ($elo < 100)) return 'Bronze';
        elseif (($elo >= 100) && ($elo < 250)) return 'Prata';
        elseif (($elo >= 250) && ($elo < 500)) return 'Ouro';
        elseif (($elo >= 500) && ($elo < 800)) return 'Diamante';
        elseif ($elo >= 800) return 'Platina';
        else return 'Cobre';
    }
}
