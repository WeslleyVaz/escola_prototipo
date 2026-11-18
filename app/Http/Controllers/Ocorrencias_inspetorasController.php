<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use App\Models\Ocorrencias_inspetoras;
use Illuminate\Http\Request;

class Ocorrencias_inspetorasController
{
    // criar ocorrencia
    public function salvar_ocorrencias(Request $request)
    {
        $request->validate([
            'aluno' => ['required', 'string', 'max:100'],
            'inspetora_responsavel' => ['required', 'integer'],
            'ocorrido' => ['required', 'string', 'max:200'],
            'procedimento_realizado' => ['required', 'string', 'max:200'],
        ]);

        try {
            $termoAluno = trim($request->string('aluno')->toString());
            $alunoEncontrado = aluno::query()
                ->where('rm', $termoAluno)
                ->orWhere('nome', $termoAluno)
                ->first();

            if (! $alunoEncontrado) {
                return response()->json([
                    'message' => 'Nenhum aluno foi encontrado com esse nome ou RM.',
                    'erro' => 's',
                ], 422);
            }

            $ocorrencia_inspetoras = new Ocorrencias_inspetoras;
            $ocorrencia_inspetoras->id_aluno = $alunoEncontrado->id;
            $ocorrencia_inspetoras->rm_aluno = $alunoEncontrado->rm;
            $ocorrencia_inspetoras->turma_aluno = $alunoEncontrado->turma;
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
