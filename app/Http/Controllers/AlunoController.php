<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use Illuminate\Http\Request;

class AlunoController
{
    // criar aluno
    public function salvar_aluno(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:aluno,nome',
            'nome_responsavel' => 'required|string|max:100',
            'rm' => 'required|string|max:10|unique:aluno,rm',
            'turma' => 'required|string|max:10',
            'numero_responsavel' => 'required|string|max:20',
        ]);

        try {
            $aluno = new aluno;
            $aluno->nome = $request->nome;
            $aluno->nome_responsavel = $request->nome_responsavel;
            $aluno->rm = $request->rm;
            $aluno->turma = $request->turma;
            $aluno->numero_responsavel = $request->numero_responsavel;

            $aluno->save();

            return response()->json(['message' => 'Aluno cadastrado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar aluno!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}
