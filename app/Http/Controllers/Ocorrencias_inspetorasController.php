<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencias_inspetoras;
use Illuminate\Http\Request;

class Ocorrencias_inspetorasController
{
    // criar ocorrencia
    public function salvar_ocorrencias(Request $request)
    {
        $request->validate([
            'id_aluno' => ['required', 'integer'],
            'rm_aluno' => ['required', 'string', 'max:5'],
            'turma_aluno' => ['required', 'string', 'max:10'],
            'inspetora_responsavel' => ['required', 'integer'],
            'ocorrido' => ['required', 'string', 'max:200'],
            'procedimento_realizado' => ['required', 'string', 'max:200'],
        ]);

        try {
            $ocorrencia_inspetoras = new Ocorrencias_inspetoras;
            $ocorrencia_inspetoras->id_aluno = $request->id_aluno;
            $ocorrencia_inspetoras->rm_aluno = $request->rm_aluno;
            $ocorrencia_inspetoras->turma_aluno = $request->turma_aluno;
            $ocorrencia_inspetoras->inspetora_responsavel = $request->inspetora_responsavel;
            $ocorrencia_inspetoras->ocorrido = $request->ocorrido;
            $ocorrencia_inspetoras->procedimento_realizado = $request->procedimento_realizado;

            $ocorrencia_inspetoras->save();

            return response()->json(['message' => 'Ocorrência cadastrada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar ocorrência!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}
