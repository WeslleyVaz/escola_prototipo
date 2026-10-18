<?php

namespace App\Http\Controllers;

use App\Models\gestao;
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
}
