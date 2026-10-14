<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class AlunosController
{
     // criar aluno
    public function salvar_ocorrencias(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'nome_responsavel' => ['required', 'string', 'max:100'],
            'rm' => ['required', 'string', 'max:5'],
            'turma' => ['required', 'string', 'max:10'],
            'numero_responsavel' => ['required', 'integer'],
        ]);

        try {
            $alunos = new aluno();
            $alunos->rm = $request->rm;
            $alunos->turma = $request->turma;
            $alunos->nome = $request->nome;
            $alunos->nome_responsavel = $request->nome_responsavel;
            $alunos->numero_responsavel = $request->numero_responsavel;

            $alunos->save();

            return response()->json(['message' => 'Aluno cadastrado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar aluno!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

}
