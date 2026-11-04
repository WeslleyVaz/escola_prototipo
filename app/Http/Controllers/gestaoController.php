<?php

namespace App\Http\Controllers;

use App\Models\gestao;
use App\Models\GestaoToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class gestaoController
{
    public function salvar_gestao(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:14|unique:gestao,cpf',
            'senha' => 'required|string|min:6',
        ]);

        try {
            $gestao = new gestao;
            $gestao->cpf = $request->cpf;
            $gestao->senha = Hash::make($request->senha);

            $gestao->save();

            return response()->json(['message' => 'Gestão cadastrada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar gestão!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    // todas gestão
    public function listar_gestao(Request $resquest)
    {
        $gestao = gestao::all();

        return response()->json(['gestao' => $gestao], 200);
    }


    //login gestão
    public function login_gestao(Request $request)
    {
        $request->validate([
            'cpf' => ['required'],
            'senha' => ['nullable'],
        ]);

        $gestao = gestao::where('cpf', '=', $request->cpf)->first();
        if ($gestao) {

            if (Hash::check($request->senha, $gestao->senha)) {
                $gestaoToken = new GestaoToken;
                $gestaoToken->gestao_id = $gestao->id;
                $gestaoToken->token_gestao = Hash::make($request->cpf.$request->senha.now());
                $gestaoToken->valido_ate = now()->addDays(7);

                $gestaoToken->save();

                return response()->json(['message' => 'Login realizado com sucesso!', 'erro' => 'n'], 200);

            } else {
                return response()->json(['message' => 'Senha incorreta!', 'erro' => 's'], 200);
            }
        } else {
            return response()->json(['message' => 'Gestão não encontrada!', 'erro' => 's'], 200);
        }
    }

    //LOGOUT
    public function logout_gestao(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:gestao_token,id',
        ]);

        try {
            $token_gestao = GestaoToken::FindOrFail($request->integer('id'));
            $token_gestao->delete();

            return response()->json(['message' => 'Token de gestão deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar token de gestão!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }
}


