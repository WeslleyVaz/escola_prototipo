<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencias_inspetoras;

class Ocorrencias_inspetorasController
{
    // criar ocorrencia
    public function salvar_ocorrencias(Request $request)
    {
        $request->validate([
            'id_aluno' => ['required', 'integer'],
            'rm_aluno' => ['required', 'string', 'max:5'],
            'turma_aluno' => ['required', 'string', 'max:10'],
            'id_inspetora' => ['required', 'integer'],
            'ocorrido' => ['required', 'string', 'max:200'],
            'procedimento_realizado' => ['required', 'string', 'max:200'],
        ]);

        try {
            $ocorrencia = new Ocorrencias_inspetoras;
            $ocorrencia->id_aluno = $request->id_aluno;
            $ocorrencia->rm_aluno = $request->rm_aluno;
            $ocorrencia->turma_aluno = $request->turma_aluno;
            $ocorrencia->id_inspetora = $request->id_inspetora;
            $ocorrencia->ocorrido = $request->ocorrido;
            $ocorrencia->procedimento_realizado = $request->procedimento_realizado;

            $ocorrencia->save();

            return response()->json(['message' => 'Ocorrência cadastrada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar ocorrência!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}
