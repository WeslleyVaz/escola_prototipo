<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use Illuminate\Http\Request;

class OcorrenciasController
{
    // criar ocorrencia
    public function salvar_ocorrencias(Request $request)
    {
        $request->validate([
            'id_aluno' => ['required', 'integer'],
            'rm_aluno' => ['required', 'string', 'max:5'],
            'turma_aluno' => ['required', 'string', 'max:10'],
            'id_inspetora_responsavel' => ['required', 'integer'],
            'ocorrido' => ['required', 'string', 'max:200'],
            'procedimento_realizado' => ['required', 'string', 'max:200'],
        ]);

        try {
            $ocorrencia = new Ocorrencia();
            $ocorrencia->id_aluno = $request->id_aluno;
            $ocorrencia->rm_aluno = $request->rm_aluno;
            $ocorrencia->turma_aluno = $request->turma_aluno;
            $ocorrencia->id_inspetora_responsavel = $request->id_inspetora_responsavel;
            $ocorrencia->ocorrido = $request->ocorrido;
            $ocorrencia->procedimento_realizado = $request->procedimento_realizado;

            $ocorrencia->save();

            return response()->json(['message' => 'Ocorrência cadastrada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar ocorrência!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    // vizualizar ocorrencia
    public function ver_ocorrencia(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $ocorrencia = Ocorrencia::find($request->id);
        if ($ocorrencia) {
            return response()->json(['ocorrencia' => $ocorrencia, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Ocorrência não encontrada!', 'erro' => 's'], 200);
        }
    }

    // vizualizar ocorrencias
    public function listar_ocorrencias(Request $request)
    {
        $ocorrencias = Ocorrencia::all();

        return response()->json(['ocorrencias' => $ocorrencias], 200);
    }

    public function listar_ocorrencias_simples(Request $request)
    {
        $ocorrencias = Ocorrencia::select('rm_aluno', 'ocorrido')->get();

        return response()->json(['ocorrencias' => $ocorrencias], 200);
    }

    // alterar ocorrencia
    public function alterar_ocorrencia(Request $request)
    {

        $request->validate([
            'id_aluno' => ['required', 'integer'],
            'rm_aluno' => ['required', 'string', 'max:5'],
            'turma_aluno' => ['required', 'string', 'max:10'],
            'id_inspetora_responsavel' => ['required', 'integer'],
            'ocorrido' => ['required', 'string', 'max:200'],
            'procedimento_realizado' => ['required', 'string', 'max:200'],
        ]);

        try {

            $ocorrencia = Ocorrencia::find($request->id);

            if ($ocorrencia->ocorrido != $request->ocorrido) {
                $ocorrencia_ocorrido_igual = Ocorrencia::where('ocorrido', $request->ocorrido)->first();
                if ($ocorrencia_ocorrido_igual) {
                    return response()->json(['message' => 'Ocorrência já cadastrada!', 'erro' => 's'], 200);
                }
            }
            $ocorrencia->ocorrido = $request->ocorrido;
            $ocorrencia->procedimento_realizado = $request->procedimento_realizado;

            $ocorrencia->save();

            return response()->json(['message' => 'Ocorrência alterada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar ocorrência!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    // deletar ocorrencia
    public function deletar_ocorrencia(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:ocorrencias,id',
        ]);

        try {
            $ocorrencia = Ocorrencia::find($request->id);
            $ocorrencia->delete();

            return response()->json(['message' => 'Ocorrência deletada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar ocorrência!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }


}
