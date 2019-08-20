<?php

namespace App\Http\Controllers\Conta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\UsuariosTemporarios;
use App\Model\Usuarios;

class ContaController extends Controller
{
    public function cadastrar(Request $request)
    {
        $dados = $request->all();
        $validator = Validator::make($dados, [
            'cid'      => 'required|unique:usuarios_temporarios|numeric',
            'nome'     => 'required|min:4|max:64',
            'email'    => 'required|unique:usuarios_temporarios|email',
            'senha'    => 'required|min:8|max:64',
            'capitulo' => 'required|numeric'
        ], [
            'cid.required'      => 'O ID é obrigatório no cadastro.',
            'cid.numeric'       => 'O ID deve ter somente números.',
            'cid.unique'        => 'ID já cadastrado no sistema.',

            'nome.required'     => 'O nome é obrigatório no cadastro.',
            'nome.min'          => 'O nome deve ter no mínimo 4 caracteres.',
            'nome.max'          => 'O nome deve ter no máximo 64 caracteres.',

            'email.required'    => 'O email é obrigatório no cadastro.',
            'email.email'       => 'O email inserido é inválido.',
            'email.unique'      => 'Email já cadastrado no sistema.',

            'senha.required'    => 'A senha é obrigatório no cadastro.',
            'senha.min'         => 'A senha deve ter no mínimo 8 caracteres.',
            'senha.max'         => 'A senha deve ter no máximo 64 caracteres.',

            'capitulo.required' => 'O capítulo é obrigatório no cadastro.',
            'capitulo.numeric'  => 'O capítulo deve ser em formato númerico.',
        ]);

        if (!$validator->fails()) {
            $dados['role'] = 1;
            $dados['status'] = 3;
            $dados['senha'] = base64_encode($dados['senha']);
            $criar_usuario_temporario = UsuariosTemporarios::create($dados)->toSql();
            if ($criar_usuario_temporario)
                return response()->json([
                    'mensagem' => 'Usuário criado com sucesso!',
                ], 200);
            return response()->json([
                'error' => 'Falha ao criar usuário, tente novamente mais tarde!'
            ], 400);
        }
        return response()->json([
            'error' => $validator->errors()->first()
        ], 400);
    }
    public function logar(Request $request)
    {
        $dados = $request->all();
        $validator = Validator::make($dados, [
            'cid'   => 'required|numeric',
            'senha' => 'required|min:8|max:64'
        ], [
            'cid.required' => 'O ID é obrigatório para fazer login.',
            'cid.numeric' => 'O ID deve ser somente números.',

            'senha.required' => 'A senha é obrigatória para fazer login.',
            'senha.min' => 'A senha deve ter ao menos 8 caracteres.',
            'senha.max' => 'A senha deve ter no máximo 64 caracteres.',
        ]);
        if (!$validator->fails()) {
            $dados['senha'] = base64_encode($dados['senha']);
            $usuario = Usuarios::where([
                ['cid', '=', $dados['cid']],
                ['senha', '=', $dados['senha']],
            ])->get();
            if (count($usuario) == 1) {
                return response()->json([
                    'mensagem' => 'Usuário logado com sucesso!',
                    'usuario' => $usuario
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Usuário ou senha inválidos!',
                ], 400);
            }
        }
        return response()->json([
            'error' => $validator->errors()->first()
        ], 400);
    }
    public function verificar_status($id)
    {
        $usuario = UsuariosTemporarios::where([
            ['status', '=', 1],
            ['cid', '=', $id]
        ])->first();
        if (isset($usuario))
            return response()->json([
                'status' => $usuario['status']
            ]);
        return response()->json([
            'status' => 0
        ]);
    }
    public function get_usuarios_temporarios(Request $request)
    {
        $usuarios_temporarios = UsuariosTemporarios::where([
            ['capitulo', $request->get('capitulo')],
            ['status', '=', 3]
        ])->get();
        if (count($usuarios_temporarios)) return $usuarios_temporarios;
        else return response(null, 204);
    }
    public function modificar_usuario_temporario(Request $request)
    {
        $dados = $request->all();
        $usuario = $dados['usuario'];
        $usuario['status'] = $dados['status'];
        unset($usuario['id']);
        if ($dados['status'] == 1) {
            $alterar_usuario_temproario = UsuariosTemporarios::where('cid', $usuario['cid'])->update(['status' => $dados['status']]);
            $usuario['status'] = 1;
            $criar_usuario = Usuarios::create([
                'cid'      => $usuario['cid'],
                'nome'     => $usuario['nome'],
                'email'    => $usuario['email'],
                'senha'    => $usuario['senha'],
                'role'     => 1,
                'status'   => 1,
                'capitulo' => $usuario['capitulo']
            ]);
            if ($criar_usuario)
                return response()->json([
                    'mensagem' => 'Solicitação aceita com sucesso.',
                    'cid' => $usuario['cid']
                ], 200);
            return response('Erro ao aprovar usuário', 400);
        }
        unset($usuario['senha']);
        $alterar_usuario_temproario = UsuariosTemporarios::where('cid', $usuario['cid'])->update(['status' => $dados['status']]);
        if ($dados['status'] == 2 && $alterar_usuario_temproario)
            return response()->json([
                'mensagem' => 'Solicitação rejeitada com sucesso.',
                'cid' => $usuario['cid']
            ], 200);
        if ($dados['status'] == 0 && $alterar_usuario_temproario)
            return response()->json([
                'mensagem' => 'Solicitação excluida com sucesso.',
                'cid' => $usuario['cid']
            ], 200);
        if (!$alterar_usuario_temproario)
            return response('Houve um erro ao alterar situação do usuário', 400);
    }
}