<?php

namespace App\Http\Controllers;

use App\Models\gestao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\GestaoToken;

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



    public function autenticar_gestao(Request $request)
    {
        $request->validate([
            'cpf' => ['required'],
            'senha' => ['nullable']
        ]);

        $gestao = gestao::where('cpf', "=", $request->cpf)->first();
        if($gestao){

            if (Hash::check($request->senha, $gestao->senha)) {
            $gestaoToken = new GestaoToken();
            $gestaoToken->gestao_id = $gestao->id;
            $gestaoToken->token = Hash::make($request->cpf . $request->senha . now());
            $gestaoToken->valido_ate = now()->addDays(7);

            $gestaoToken->save();
            return response()->json(['message' => 'Login realizado com sucesso!', 'erro' => 'n'], 200);
            
            }else {
                return response()->json(['message' => 'Senha incorreta!', 'erro' => 's'], 200);
            }
        }else{
            return response()->json(['message' => 'Gestão não encontrada!', 'erro' => 's'], 200);
        }
    }
}
