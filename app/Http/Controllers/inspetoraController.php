<?php

namespace App\Http\Controllers;

use App\Models\inspetoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class inspetoraController
{
    public function salvar_inspetora(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:14|unique:inspetoras,cpf',
            'senha' => 'required|string|min:6',
        ]);

        try {
            $inspetora = new inspetoras;
            $inspetora->cpf = $request->cpf;
            $inspetora->senha = Hash::make($request->senha);

            $inspetora->save();

            return response()->json(['message' => 'Inspetora cadastrada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar inspetora!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_inspetora(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $inspetora = inspetoras::find($request->id);
        if ($inspetora) {
            return response()->json(['inspetora' => $inspetora, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Inspetora não encontrada!', 'erro' => 's'], 200);
        }
    }

    public function listar_inspetoras(Request $request)
    {
        $inspetoras = inspetoras::all();

        return response()->json(['inspetoras' => $inspetoras], 200);
    }
}
